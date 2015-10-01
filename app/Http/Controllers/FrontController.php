<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

use App;

class FrontController extends Controller
{
    public function show()
    {
        $posts = Post::with('category', 'comments')->get();
        return view('front.index', compact('posts'));
    }

    public function showPostByCategory($id)
    {
        $posts = Category::find($id)->posts;

        return view('front.index', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::find($id);

        return view('front.single', compact('post'));
    }
}
