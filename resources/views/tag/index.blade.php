@extends('layouts.master')

@section('title', 'Tags page')

{{-- this comment will not be present in the rendered HTML --}}
@section('sidebar')
    @parent
    <p>this is tags page (not override)</p>
@endsection

@section('content')
<artilce>
<section>
<ul>
@foreach($tags as $tag)
    <li><a href="{{url('tag', $tag->id)}}">{{ $tag->name }}</a></li>
@endforeach
</ul>
</section>
</artilce>
@endsection