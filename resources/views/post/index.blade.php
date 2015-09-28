@extends('layouts.master_admin')

@section('content')

    <div class="add_post">
        <button class="btn btn-default" type="submit"><a href="{{url('admin/post/create')}}">Add post</a></button>
    </div>

    <div class="pagination">
        {!!$posts->render()!!}
    </div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Status</th>
            <th>Voir</th>
            <th>titre</th>
            <th>date publication</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="{{($post->status=='published')? 'success' : 'info'}}">
                <td>{{$post->status}}</td>
                <td><a href="{{url('post/'.$post->id)}}"><span
                                class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><span class="glyphicon glyphicon-edit"></span> <a
                            href="{{url('post/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
                <td>{{$post->published_at}} </td>
                <td>{!! Form::open(['url'=>'post/'.$post->id, 'method'=>'DELETE', 'class'=>'form-delete']) !!}
                    <div class="form-group">
                        {!! Form::submit('delete', ['class'=>'btn']) !!}
                    </div>
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {!!$posts->render()!!}
    </div>
@stop