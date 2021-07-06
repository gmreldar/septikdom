@if($articles->count())
    @foreach($articles as $article)
        <div class="item"><a href="{{route('blog.article', [$article->category->link, $article->link])}}">{{ $article->name }}</a></div>
    @endforeach
@else
    <div class="item not-result">Нет результатов</div>
@endif