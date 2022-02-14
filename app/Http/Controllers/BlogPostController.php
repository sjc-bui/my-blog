<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        // show all blog posts
        $posts = BlogPost::all(); // fetch all blog post form the database
        return view('blog.index', ['posts' => $posts]); // return the view with posts
    }

    public function create()
    {
        //show form to create a blog post
        return view('blog.create');
    }

    public function store(Request $request)
    {
        //store a new post
        $newPost = BlogPost::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'user_id' => 1
        ]);
        return redirect('blog/'.$newPost->id);
    }

    public function show(BlogPost $blogPost)
    {
        //show a blog post
        return view('blog.show', ['post' => $blogPost]);
    }

    public function edit(BlogPost $blogPost)
    {
        //show form to edit the post
        return view('blog.edit', ['post' => $blogPost]);
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect('blog/'.$blogPost->id);
    }

    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();
        return redirect('/blog');
    }
}
