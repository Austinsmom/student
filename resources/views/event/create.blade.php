{!! Form::open(['url'=>'event']) !!}
<p>
{!! Form::label('name', 'Name:', ['for'=>'name']) !!}
{!! Form::text('name', old('name'), ['id'=>'name'] ) !!}
{!! $errors->first('name', '<span class="error">:message</span>') !!}
</p>
<p>
{!! Form::label('email', 'Email:', ['for'=>'email']) !!}
{!! Form::text('email') !!}
{!! $errors->first('email', '<span class="error">:message</span>') !!}
</p>
{!! Form::submit('create') !!}
{!! Form::close() !!}
