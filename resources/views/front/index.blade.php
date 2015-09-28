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
<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a>
<br> category name: {{ $post->category? $post->category->title : 'no category' }}</h2>
    <p>Number comment: {{$post->comments? $post->comments->count(): 0}}</p>
</section>
@empty
<section>
    <p>désolé pas d'article</p>
</section>
@endforelse

</article>
@endsection