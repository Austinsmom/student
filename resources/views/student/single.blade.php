@extends('layouts.master')

@section('title')
    @if(!empty($student))
        {{$student->username}}
    @endif
@stop

@section('sidebar')
    <h2>Override --> This is sidebar Student only</h2>
@endsection

@section('content')
@if(!empty($student))
    <h2>{{$student->username}}</h2>
    <p>{{$student->email}}</p>
@else
    <p>Désolé pas de student</p>
@endif
@endsection