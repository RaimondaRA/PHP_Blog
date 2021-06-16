<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('welcome'); //metodas, grazinantis pradini puslapi
    }

    public function getUser(){
        $users = [
            'Raimonda',
            'Ieva',
            'Tomas'
        ];
        return view('user', compact('users'));
    }
}
