{!! Form::open(['route'=>['event.update', $event->id], 'method' => 'PUT' ]) !!}
<p>
    {!! Form::label('name', 'Name:', ['for'=>'name']) !!}
    {!! Form::text('name', $event->name, ['id'=>'name'] ) !!}
    {!! $errors->first('name', '<span class="error">:message</span>') !!}
</p>
<p>
    {!! Form::label('email', 'Email:', ['for'=>'email']) !!}
    {!! Form::text('email', $event->email) !!}
    {!! $errors->first('email', '<span class="error">:message</span>') !!}
</p>
{!! Form::submit('create') !!}
{!! Form::close() !!}