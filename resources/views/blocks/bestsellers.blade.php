<section id="bestsellers" style="background: white">
    <div class="wrapper">
        <div class="title-box">
            <div class="title-content">
                <h2 class="header-bigtitle"><a href="{{route('services')}}">Хиты продаж</a></h2>
            </div>
        </div>
    </div>
    <div class="slider-bestsellers-box">
        <div class="custom-prev-arrow slider10">
            <svg class="default-arrow">
            {{-- @todo папка dist нужна ли она здесь--}}
                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="slider-bestsellers">
            @isset($bestsellers)
                @foreach($bestsellers as $best)
                    @php($sale = $best['product']->sale())
                    @php($image = $best['product']->image())
                    @php($modification = App\Models\Modification::where('product_id', '=', $best['product']->id)->first())
                    <div>
                        <div class="item" style="width: 100%; display: inline-block;">
                            <div class="analog-bestsellers @if($sale) analog-bestsellers-sale @endif">
                                <a href="{{route('catalog.product', [$best['category']->link, $best['product']->link])}}"
                                   class="analog-bestsellers-img">
                                    @if($image)
                                    {{-- @todo --}}
                                        <img class="lazy" data-src="/min/{{ $image->image }}"
                                             alt="{{ $image->alt }}">
                                    @endif
                                    @if($sale)
                                        <span class="sale">{{ $sale->discount }}% акция</span>
                                    @endif
                                </a>
                                <div class="analog-bestsellers-footer">
                                    <div class="analog-bestsellers-content">
                                        <p style="font-size: 12px">
                                            @isset($modification->proizvoditelnost)
                                                Производительность {{ $modification->proizvoditelnost }} куб/сут
                                            @endisset
                                        </p>
                                        <p style="font-size: 12px">
                                            @isset($modification->volume)
                                                Залповый сброс {{ $modification->volume }}л
                                            @endisset
                                        </p>
                                        <p style="font-size: 12px">
                                            @isset($modification->massa)
                                                Масса {{ $modification->massa }}кг
                                            @endisset
                                        </p>
                                        <a href="{{route('catalog.product', [$best['category']->link, $best['product']->link])}}"
                                           class="analog-bestsellers-title">{{ $best['product']->name }}</a>
                                        <p class="analog-bestsellers-oldprice">
                                            @if($sale)
                                                <strike>{{ number_format($sale->price, 0, '.', ' ') }} руб.</strike>
                                            @endif
                                        </p>
                                        <div class="analog-bestsellers-price-box">
                                            <div class="analog-bestsellers-price-box-inner">
                                                <p class="analog-bestsellers-price">
                                                    от {{ number_format($best['product']->price(), 0, '.', ' ') }}
                                                    руб.</p>
                                                {{--<div class="reviews">--}}
                                                    {{--<a href="{{route('catalog.product', [$best['category']->link, $best['product']->link . '#otzyvy'])}}"--}}
                                                       {{--class="comments">--}}
                                                        {{--<svg>--}}
                                                            {{--<use xlink:href="{{ asset('/img/svgdefs.svg#icon-dialog') }}"--}}
                                                                 {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                                                        {{--</svg>--}}
                                                        {{--<span class="value">{{ $best['product']->comments->where('is_active', 1)->count() }}</span>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="item" style="width: 100%; display: inline-block;">--}}
                        {{--<a href="{{route('catalog.category', $best['product']->link)}}">--}}
                        {{--<div class="img"><img data-src="/min/{{ $best['product']->image }}" alt="{{ $best['product']->alt }}"--}}
                        {{--class="lazy-img"></div>--}}
                        {{--</a>--}}
                        {{--<div class="item-text">--}}
                        {{--<a href="{{route('catalog.category', $best['product']->link)}}">--}}
                        {{--<div class="item-text-inner">--}}
                        {{--<h3>{{ $best['product']->name }}</h3>--}}
                        {{--<p>{!! $best['product']->annotation !!}</p>--}}
                        {{--</div>--}}
                        {{--</a><a href="{{route('catalog.category', $best['product']->link)}}" class="item-link">Подробнее</a>--}}
                        {{--<div class="svg-box">--}}
                        {{--<svg class="no-hover-svg">--}}
                        {{--<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"--}}
                        {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--</svg>--}}
                        {{--<svg class="hover-svg">--}}
                        {{--<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"--}}
                        {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--</svg>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="custom-next-arrow slider10">
            <svg class="default-arrow">
            {{-- @todo folder dist --}}
                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="custom-dots slider10"></div>
    </div>

    <style>
        .analog-bestsellers .reviews {
            display: none;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }

        .analog-bestsellers .reviews .comments svg {
            color: #767676;
            width: 11px;
            height: 10px;
            margin-right: 5px;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }

        .analog-bestsellers .reviews .comments .value {
            color: #767676;
            font-size: 14px;
            font-weight: 500;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }

        .analog-bestsellers .reviews a {
            /*display: none;*/
            color: #34a844;
            font-size: 18px;
            font-weight: 500;
        }

        .analog-bestsellers:hover .reviews {
            margin-top: 5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .analog-bestsellers-price {
            display: block;
            color: #151515;
            font-size: 19px;
            line-height: 24px;
            font-family: Montserrat;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .analog-bestsellers-price-box{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .analog-bestsellers-price-box-inner {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
        }

        .analog-bestsellers-footer .analog-bestsellers-content .analog-bestsellers-oldprice{
            margin-top: auto;
            padding-bottom: 5px !important;
            display: block;
            font-family: Montserrat;
            color: #838383;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }

        .analog-bestsellers {
            position: relative;
            height: 430px;
            border-radius: 4px;
            border: 1px solid #eaebed;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
            background: white;
        }

        .analog-bestsellers a img{
            margin: auto;
            max-height: 161px;
            margin-top: 41px;
            /*transform: translateY(-50%);*/
        }

        .analog-bestsellers .analog-bestsellers-img .sale {
            display: block;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 14px;
            color: #e2425a;
            font-weight: 500;
            border: 1px solid #e2425a;
            border-radius: 4px;
            padding: 4px 12px;
            text-transform: uppercase;
        }

        .analog-bestsellers .analog-bestsellers-footer {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            height: 185px;
            border-radius: 0 0 4px 4px;
            background-color: #fff;
            padding: 20px;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
            padding-top: 0;
        }

        .analog-bestsellers .analog-bestsellers-footer .analog-bestsellers-content {
            height: 100%;
            color: #767676;
            font-family: Lato;
            font-size: 18px;
            font-weight: 400;
            line-height: 20px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .analog-bestsellers .analog-bestsellers-footer .analog-bestsellers-content .analog-bestsellers-title {
            display: block;
            color: #151515;
            font-family: Montserrat;
            font-size: 17px;
            line-height: 24px;
            font-weight: 500;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            /*overflow: hidden;*/
            text-overflow: ellipsis;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }
    </style>
</section>

@section('script')
    <script defer src="{{ asset('/js/slick.min.js') }}"></script>

    <script defer src="{{ asset('/js/slider.js') }}"></script>
@endsection