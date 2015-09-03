@extends('layouts.master')

@section('content')
<article>
    <section>
    <ul>
        <li><a href="{{url('student')}}">Tous les students</a></li>
        <li><a href="{{url('tag')}}">Tous les tags</a></li>
        <li><a href="{{url('post')}}">Tous les posts</a></li>
    </ul>
    </section>
</article>
@endsection