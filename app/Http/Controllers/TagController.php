<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show()
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function showTag($id)
    {
        $tag = Tag::find($id);

        return view('tag.single', compact('tag'));
    }

}