@extends('main')
@section('content')

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @include('_partials/errors')
        <form action="/storeupdate/{{$post->id}}" method="post" enctype="multipart/form-data">
            <!-- token, protection, skirta del saugumo, sukuria input type hidden-simboliu seka -->
            {{csrf_field()}}
            <!-- isidedame patch is route - web.php -->
            {{method_field('PATCH')}}  
            <div class="form-group mb-2">
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Content" name="content">{{$post->content}}</textarea>
            </div>
            <div class="form-group custom-file offset-md-3 col-md-6 mb-3 mb-md-0">
                <input type="file" class="custom-file-input text-black" name="img" id="postimg" lang="lt">
                <label class="custom-file-label text-black" for="listingImage">Choose file</label>
            </div>
            <button type="submit" class="btn btn-success mt-2 mb-2" onclick="return confirm('Are you sure you want to edit this record?')">Save</button>
        </form>
    </div>
</div>
@endsection