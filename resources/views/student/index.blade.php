@extends('layouts.master')

@section('title', 'Students page')

{{-- this comment will not be present in the rendered HTML --}}
@section('sidebar')
    @parent
    <p>this is students page (not override)</p>
@endsection

@section('content')
<ul>
@foreach($students as $student)
    <li><a href="{{url('student', $student->id)}}">{{ $student->username }}</a></li>
@endforeach
</ul>
@endsection