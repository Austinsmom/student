@if(Session::has('message'))
   <h1>{{Session::get('message')}}</h1>
@endif

@forelse($events as $event)
    <p>{{$event->name}}</p>
@empty
    <p>no event</p>
@endforelse
