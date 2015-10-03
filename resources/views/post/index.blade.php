@extends('layouts.master_admin')

@section('scripts')
    @include('post.partials.script')
@stop

@section('content')

    <div class="admin">
        <button class="btn btn-default" type="submit"><a href="{{url('dashboard')}}">Dashboard</a></button>
    </div>

    <div class="add_post">
        <button class="btn btn-default" type="submit"><a href="{{url('admin/post/create')}}">Add post</a></button>
    </div>

    <div class="pagination">
        {!!$posts->render()!!}
    </div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>{!! Form::checkbox('selected') !!}</th>
            <th>Status</th>
            <th>Voir</th>
            <th>titre</th>
            <th>category</th>
            <th>date publication</th>
            <th>change status</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="{{($post->status=='published')? 'success' : 'info'}}">
                <td>{!! Form::checkbox('posts[]', $post->id, false, ['class'=>'action']) !!}</td>
                <td>{{$post->status}}</td>
                <td><a href="{{url('admin/post/'.$post->id)}}"><span
                                class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><span class="glyphicon glyphicon-edit"></span> <a
                            href="{{url('admin/post/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
                <td>{{$post->category? $post->category->title : 'no category'}}</td>
                <td>{{$post->published_at}} </td>
                <td>
                    <button disabled="disabled" class="btn btn-{{$post->status=='published?'? 'success' : 'warning'}}">{{$post->status}}</button>
                </td>
                <td>{!! Form::open(['route'=>['admin.post.destroy',$post->id] , 'method'=>'DELETE', 'class'=>'form-delete']) !!}
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