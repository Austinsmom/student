<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
    public function show()
    {
        $posts = Post::with('category')->get();

        return view('post.index', compact('posts'));
    }

    public function showPostByCategory($id)
    {
        $posts = Category::find($id)->posts;

        return view('post.index', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::find($id);

        return view('post.single', compact('post'));
    }
}
