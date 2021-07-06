<div class="products">
    <span class="result-title">
        Каталог
    </span>
    <div class="result">
        @if($pCount)
            @foreach($products as $product)
                <div class="item">
                    <a href="{{route('catalog.product', [$product['category']['link'], $product['product']['link']])}}">{{ $product['product']['name'] }}</a>
                </div>
            @endforeach
        @else
            <div class="item not-result">Нет результатов</div>
        @endif
    </div>
</div>

<div class="blogs">
    <span class="result-title">
        Блоги
    </span>
    <div class="result">
        @if($articles->count())
            @foreach($articles as $article)
                <div class="item">
                    <a href="{{route('blog.article', [$article->category->link, $article->link])}}">{{ $article->name }}</a>
                </div>
            @endforeach
        @else
            <div class="item not-result">Нет результатов</div>
        @endif
    </div>
</div>