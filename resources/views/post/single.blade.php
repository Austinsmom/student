@extends('layouts.master')

@section('title', 'Post page')

    {{-- this comment will not be present in the rendered HTML --}}
@section('sidebar')
    @parent
    <p>this is post page (not override)</p>
@endsection

@section('content')
<article>
@if(!empty($post))
    <section>
        <h2>{{$post->title}}</h2>
        {{$post->content}}
        <h2>Comments:</h2>
        @forelse($post->comments as $c)
            <p>{{$c->content}}</p>
        @empty
            <p>No comment</p>
        @endforelse
    </section>
@else
<section>
    <p>No post</p>
</section>
@endif
</article>
@endsection