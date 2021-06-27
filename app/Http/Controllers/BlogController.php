<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //prikabiname, uzsius'iname modeli Post, kad galetume sukurti nauja post'a
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]); //nieko nerodys neprisijungusiam vartotojui, isskyrus index ir show
    }

    public function index(){
        $posts=Post::paginate(4); //matysim 4 postus
        //$posts= Post::all(); //gausim viska
        return view('pages.home', compact('posts')); //metodas, grazinantis pradini puslapi
    }

    public function createPost(){ //metodas, grazinantis post forma
        return view ('pages.add-post');
    }

    public function store(Request $request){ //skirtas post'o issaugojimui. per request - pasiimame duomenis is formos
        //dd(request('title')); - pasitikrinti, ar gauname title
        //dd($request->all()); - gauname viska (visus duomenis), ka pasiunteme is formos, net ir token
        $validateData = $request->validate([ //valdacijos taisykles
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'img' =>'mimes:jpg,jpeg,png|required|max: 10000'
        ]);
        $path = $request->file('img')->store('public/images'); //nurodome, kur issaugome ikelta paveiksliuka
        $filename = str_replace('public/', "", $path);
        Post::create([ //sukuriame posta (per modeli, kvieciamas statinis metodas create)
            'title' => request('title'), //nurodome, kokius laukelius norime, atsispausdiname siunciama pavadinima
            'content' => request('body'), //content - pavadinimas (name), kuris nurodytas formoje add-post.blade.php
            'img' => $filename,
            'user_id' => Auth::id()
        ]);

        return redirect('/'); //kai papostinam sekmingai, griztame i pradini psl
    }

    public function show(Post $post){ //paduosime posta pagal jo id
        
        return view('pages.show-post', compact('post')); //i sablona idedamas konkretus postas
    }

    public function destroy(Post $post){ //istrinimas postas ir grazinamas vartotojas i pradini psl.
        if(Gate::allows('delete', $post)){
            // $post->delete();
        return redirect('/');
        }
        dd('Klaida, Jus neturite teises');
    }

    public function update(Post $post){
        if(Gate::allows('update', $post)){ //jei leidziama redaguoti, uzkraunamas post update psl
        return view('pages.update', compact('post'));
        }
        dd('Klaida, Jus neturite teises'); //kitu atveju - neleidziama redaguoti
        //kad ismestu graziai klaida - galima parasyti su return view
    }

    public function storeUpdate(Request $request, Post $post){
        if($request->file()){//patikriname, ar prikabintas buvo failas
            Storage::delete('app/public'.$post->img); //nurodome, kur ir koks yra failas, jei buvo - istriname sena
            $path = $request->file('img')->store('public/images'); 
            $filename = str_replace('public/', "", $path);
            Post::where('id', $post->id)->update(['img' =>$filename]);
        }
        Post::where('id', $post->id)->update($request ->only(['title', 'content'])); //atsirenkame posta pagal id
        return redirect('/post/'.$post->id);
    }
}
