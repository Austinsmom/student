@extends('layouts.master')

@section('title', 'Posts page')

    {{-- this comment will not be present in the rendered HTML --}}
@section('sidebar')
    @parent
    <p>this is posts page (not override)</p>
@endsection

@section('content')
<article>
@forelse($posts as $post)
<section>
<h2>{{$post->title}}
<br> category name: {{ $post->category? $post->category->title : 'no category' }}</h2>
</section>
@empty
<section>
    <p>désolé pas d'article</p>
</section>
@endforelse

</article>
@endsection