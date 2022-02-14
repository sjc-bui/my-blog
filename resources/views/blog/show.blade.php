@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="dislay-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p>
                <hr>
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit post</a>
                <br><br>
                <form action="" id="delete-frm" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
