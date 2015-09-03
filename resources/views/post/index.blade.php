@extends('layouts.master')

@section('title', 'Posts page')

    {{-- this comment will not be present in the rendered HTML --}}
@section('sidebar')
    @parent
    <p>this is posts page (not override)</p>
@endsection

@section('content')
    <ul>
        @forelse($posts as $post)
            <li>{{$post->title}}
            <br> category name: {{ $post->category? $post->category->title : 'no category' }} </li>
        @empty
        <p>No post</p>
        @endforelse
    </ul>
@endsection