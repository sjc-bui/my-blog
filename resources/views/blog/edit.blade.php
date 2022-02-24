@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('blogs') }}" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Edit Post</h1>
                <p>Edit and submit this form to update a post.</p>
                <hr>
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="title">Post label</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title." value="{{ $post->title }}">
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="body">Post body</label>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10" rows="5" required placeholder="Enter post body">{{ $post->body }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">Update post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
