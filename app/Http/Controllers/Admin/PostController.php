<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Post;

use Form;

class PostController extends Controller
{

    /**
     * @abstract middleware auth protected dashboard
     */
    public function __construct()
    {
        $this->middleware('auth');

        // helper Form macro
        Form::macro('published', function () {
            return '<input class="form-control" type="date" name="published_at" value="' . Carbon::now()->toDateString() . '">';
        });

        // todo Form::myRadio('test', 'foo="baz"', 'checked')
        Form::macro('myRadio', function ($name, ...$args) {

            $attr = '';
            if (!empty($args)) {
                foreach ($args as $value) $attr .= " $value ";
            }

            return sprintf('<input type="radio" name="%s" %s >',
                $name,
                $attr
            );

        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $posts = Post::paginate(5);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $categories = Category::forCreate()->get();

        $cats = [];

        foreach ($categories as $category) {
            $cats[$category->id] = $category->title;
        }

        return view('post.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
