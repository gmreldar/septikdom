<div class="posts">
    @isset($articles)
    @foreach($articles as $article)
        <a href="{{route('blog.article', [$article->category->link, $article->link])}}" class="post">
            <div class="post-img_wrapper">
                <div class="post-img" style="background-image: url(/min/{{ $article->image }});"></div>
            </div>
            <div class="post-body">
                <div class="post-desc">
                    <h2>{{ $article->name }}</h2>
                    <p>{{ $article->annotation }}</p>
                </div>
                <div class="details">
                    <span>Подробнее</span>
                    <svg>
                        <use xlink:href="/img/svgdefs.svg#icon-arrow"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
            </div>
        </a>
    @endforeach
    @endisset
        <div class="pagination">
            {{ $articles->links() }}
        </div>
</div>