@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('blogs') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post.</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter post title" value="{{ old('title')}}">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post body</label>
                                <textarea type="text" id="body" class="form-control" name="body" placeholder="Enter post body">{{ old('body')}}</textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button class="btn btn-primary" id="btn-submit">Create Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
