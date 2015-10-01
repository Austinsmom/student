<nav>
    <ul>
    <li><a href="{{url('/')}}">Home</a></li>
    @forelse($categories as $category)
        <li><a href="{{url('category', $category->id)}}">{{$category->title}}</a></li>
    @empty
        <li><a>No category</a></li>
    @endforelse
    </ul>
</nav>