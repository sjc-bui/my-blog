<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\User;
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
        $users = User::all();
        return view('blog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required',
        ],
        [
            'title.required' => 'タイトル必須項目',
            'body.required' => '記事内容必須項目',
        ]);

        //store a new post
        $newPost = BlogPost::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'user_id' => $request->user_id,
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
        return redirect(route('blog.show', $blogPost->id));
    }

    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();
        return redirect(route('blogs'));
    }
}
