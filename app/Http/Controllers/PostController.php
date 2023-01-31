<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store()
    {
        $inputs = request()->validate([
            'title' => 'required|min:3, max:255',
            'post_image' => 'file',
            'body' => 'required|max:255',
        ]);
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        return back();
    }
}
