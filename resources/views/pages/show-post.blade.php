@extends('main')
@section('content')

<!-- Main Content-->
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
                <div class="post-preview">
                    <h4 class="post-title">{{$post->title}}</h4>
                    <h6 class="post-subtitle text-secondary">{{$post->content}}</h6>
                </div>
                <img class="img-thumbnail" src="{{$post->img}}" alt="{{$post->title}}">
            <div>   
                <div class="card">
                    <div class="card-block">
                        <form action="/post/{{$post->id}}/comment" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="body" placeholder="Your comment" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success mt-2">Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="comments">
                    <ul>
                        @foreach($post->comments as $comment)
                            <li>{{$comment->comment}}</li>
                        @endforeach
                    </ul>
                </div>

                @if(Auth::user())
                <p>Actions:</p>
                    <ul>
                        <a class="btn btn-danger" href="/delete/{{$post->id}}" role="button" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        <a class ="btn btn-secondary" href="/update/{{$post->id}}" role="button">Edit</a>
                    </ul> 
                @endif
            </div>
        </div>
    </div>
@endsection
                
            

