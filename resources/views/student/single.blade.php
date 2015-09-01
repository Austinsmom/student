@if(!empty($student))
    <h2>{{$student->username}}</h2>
    <p>{{$student->email}}</p>
@else
    <p>Désolé pas de student</p>
@endif