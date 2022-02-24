<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    public function index()
    {
        //$posts = DB::table('blog_posts')->paginate(5);
        $posts = BlogPost::paginate(5);
        return view('blog.index', ['posts' => $posts]);
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
        $next = BlogPost::where('id', '>', $blogPost->id)->orderBy('id')->first();
        $prev = BlogPost::where('id', '<', $blogPost->id)->orderBy('id', 'desc')->first();
        return view('blog.show', [
            'post' => $blogPost,
            'prev' => $prev,
            'next' => $next
        ]);
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
