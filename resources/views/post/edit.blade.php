@extends('layouts.master_admin')

@yield('navigation', '<button  class="btn btn-primary" ><a href="'.route('admin.post.index').'">come back</a></button>')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            {!! Form::open(['route' => ['admin.post.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="form-group {{$errors->has('title')? 'has-error' : '' }}">
                {!! Form::label('title', 'Title:', ['for'=> 'Title'] ) !!}<br>
                {!! Form::text('title', $post->title, ['class'=>'form-control', 'id' => 'Title']) !!}
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{$errors->has('content')? 'has-error' : '' }}">
                {!! Form::label('content', 'Content:' ) !!}<br>
                {!! Form::textarea('content', $post->content) !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-lg-4 main-sidear">
            <div class="control-group">
                <div class="controls">
                    <h3>{{trans('blog.Status')}} </h3>
                    {{trans('blog.Published')}} {!!Form::radio('status', 'published', $published)!!}
                    {{trans('blog.Unpublished')}} {!!Form::radio('status', 'unpublished', !$published)!!}
                </div>
            </div>
            <div class="form-group {{$errors->has('published_at')? 'has-error' : '' }}">
                <h3>{{trans('blog.Date')}} </h3>
                {!! Form::published() !!}
                {!! $errors->first('published_at', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="control-group">
                <div class="controls">
                    <h3>{{trans('blog.category')}}</h3>
                    <ul>
                        <li>{!! Form::select('category_id', $categories, $category_id) !!}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{trans('blog.create')}}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
