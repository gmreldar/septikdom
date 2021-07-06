<div class="catalog-dropdown">
    <div class="cd-dropdown-wrapper">
        <a class="cd-dropdown-trigger" href="#0">
            Каталог
            <svg class="burger">
                <use xlink:href="/img/svgdefs.svg#icon-burger"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="close">
                <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </a>
        <nav class="cd-dropdown">
            <div class="cd-dropdown-content">
                <ul class="ul-hover">
                    @foreach($menuProductCategories as $productCategory)
                        <li class="has-children">
                            <a href="{{route('catalog.category', $productCategory->link)}}">
                                <p>{{ $productCategory->short_name }}</p>
                                {{-- <svg class="hover">
                                    <use xlink:href="/img/svgdefs.svg#icon-arrow"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg> --}}
                            </a>
                            {{--<ul class="my-dropdown-list-content">--}}
                                {{--@foreach($productCategory->productsShort as $product)--}}
                                    {{--<li>--}}
                                        {{--<a class="cd-dropdown-item item-1" href="{{route('catalog.product', [$productCategory->link, $product->link])}}">--}}
                                            {{--<p>{{ $product->name }}</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        </li>
                    @endforeach
				</ul>
            </div>
        </nav>
		</div>
</div>