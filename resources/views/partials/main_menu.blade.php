<nav>
    <a href="{{url('/')}}">Home</a>
    @forelse($categories as $category)
        <a href="{{url('category', $category->id)}}">{{$category->title}}</a>
    @empty
        <a>No category</a>
    @endforelse
</nav>