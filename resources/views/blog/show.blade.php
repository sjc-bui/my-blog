@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('blogs') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="dislay-one">{{ ucfirst($post->title) }}</h1>
                <h5 class="dislay-one">{{ $post->user_id }}</h5>
                <p>{!! $post->body !!}</p>
                <hr>
            </div>
            <div class="col-6">
                @if (isset($prev))
                    <a href="{{ route('blog.show', $prev->id) }}">{{ $prev->title }}</a>
                @endif
            </div>
            <div class="col-6">
                @if (isset($next))
                    <a href="{{ route('blog.show', $next->id) }}">{{ $next->title }}</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-outline-primary">Edit post</a>
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
