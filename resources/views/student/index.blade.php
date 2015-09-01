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
    <li>{{ $student->username }}</li>
@endforeach
</ul>
@endsection