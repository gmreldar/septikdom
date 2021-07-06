<div class="category-tags">
    <ul>
        <li class="{{ Request::url() === route('blog') ? 'active' : '' }}"><a href="{{route('blog')}}">Все</a></li>
        @isset($categories)
        @foreach($categories as $category)
            <li @isset($activeCategory) class="{{ $activeCategory->id == $category->id ? 'active' : '' }}" @endisset>
                <a href="{{route('blog.category', $category->link)}}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
        @endisset
    </ul>
</div>