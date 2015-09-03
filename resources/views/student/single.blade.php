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
<article>
@if(!empty($student))
    <section>
    <h2>{{$student->username}}</h2>
    <p>{{$student->email}}</p>
    </section>
@else
    <section>
    <p>Désolé pas de student</p>
    </section>
@endif
</article>
@endsection