<form action="{{url('event')}}" method="post">
    <input type="text"  name="name"/>

    {!! csrf_field() !!}
    <input type="submit"/>
</form>