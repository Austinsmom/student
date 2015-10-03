<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Post;
use Form;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{

    /**
     * @abstract middleware auth protected dashboard
     */
    public function __construct()
    {
        $this->middleware('auth');

        // todo marco to extend helper Form
        Form::macro('published', function ($value = null) {

            $date = $value;

            if (is_null($date)) $date = Carbon::now()->toDateString();

            return '<input class="form-control" type="date" name="published_at" value="' . $date . '">';
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

        $cats = $this->categoryTitleAndId();

        return view('post.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostFormRequest $request
     * @return Response
     */
    public function store(PostFormRequest $request)
    {
        Post::create($request->all());

        return redirect()->to('admin/post')->with('message', trans('student.success'));
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
        $post = Post::find($id);

        $categories = $this->categoryTitleAndId();

        $category_id = $post->category->id;

        $post->status == 'published' ? $published = true : $published = false;

        return view('post.edit', compact('post', 'categories', 'category_id', 'published'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostFormRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(PostFormRequest $request, $id)
    {
        Post::find($id)->update($request->all());

        return redirect()->to('admin/post')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->to('admin/post')->with('message', 'success delete');
    }

    private function categoryTitleAndId()
    {
        $categories = Category::forCreate()->get();

        $cats = [];

        foreach ($categories as $category) {
            $cats[$category->id] = $category->title;
        }

        return $cats;
    }
}
