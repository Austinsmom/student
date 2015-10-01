<form action="{{route('comment.store')}}" method="post">
    {!! csrf_field() !!}
    {!! MyHtml::email('email', old('email')) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    {!! MyHtml::content(old('content')) !!}
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    {!! MyHtml::authorUrl() !!}
    <input type="hidden" name="post_id" value="{{$post->id}}"/>
    <input type="hidden" name="published_at" value="{!! MyHtml::now() !!}"/>
    {!! MyHtml::submit() !!}
</form>
@forelse($post->comments as $c)
    <p>{{$c->content}}
        <br/>date de publication:
        <small>{{$c->published_at}} is spam {{$c->spam}}</small>
    </p>
@empty
    <p>No comment</p>
@endforelse