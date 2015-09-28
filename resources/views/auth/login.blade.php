@extends('layouts.master_login')

@section('content')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
        {{ $errors->first('email') }}
    </div>
    <div>
        Password
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
@endsection