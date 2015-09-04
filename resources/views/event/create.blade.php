{!! Form::open(['url'=>'event']) !!}
<p>
{!! Form::label('name', 'Name:', ['for'=>'name']) !!}
{!! Form::text('name', old('name'), ['id'=>'name'] ) !!}
</p>
<p>
{!! Form::label('email', 'Email:', ['for'=>'email']) !!}
{!! Form::email('email') !!}
</p>
{!! Form::submit('create') !!}
{!! Form::close() !!}
