@extends('main')
@section('content')

<!-- Main Content-->
<div class="row gx-4 gx-lg-5 justify-content-center">
<div class="col-md-10 col-lg-8 col-xl-7">
    @foreach($posts as $post)
    <!-- Post preview -->
    <div class="post-preview mb-5">
        <!-- Atidaromas postas naujame puslapyje -->
        <a href="post/{{$post->id}}" class="text-decoration-none">
        <h4 class="post-title text-secondary">{{$post->title}}</h4>
        </a>
        <img class="img-thumbnail" src="{{$post->img}}" alt="{{$post->title}}">
        <p class="post-subtitle">{{Str::limit($post->content,200)}}</p>
        <a href="/post/{{$post->id}}" class="btn btn-success text-white">Read more</a>
        <p class="post-meta">
            Posted by
            <a href="#!">RA</a>
            on June 21, 2021
        </p>
    </div>
    @endforeach
        <!-- Pager-->
        <div class="clearfix">
            <!-- atsiranda mygtukai -->
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
@endsection   
