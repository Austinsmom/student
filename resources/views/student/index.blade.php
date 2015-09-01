@extends('layouts.master')

@section('title', 'Students page')

@section('content')
<ul>
@foreach($students as $student)
    <li>{{ $student->username }}</li>
@endforeach
</ul>
@endsection