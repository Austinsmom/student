@extends('layouts.master')

@section('title')
    @if(!empty($tag))
        {{$tag->name}}
    @endif
@stop

@section('sidebar')
    <h2>Override --> This is sidebar Tag only</h2>
@endsection

@section('content')
@if(!empty($tag))
    <h2>{{$tag->name}}</h2>
@else
    <p>Désolé pas de tag</p>
@endif
@endsection