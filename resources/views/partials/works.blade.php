<div class="clear_tpl work-items">
    @foreach($works as $work)
        <div class="work-item">
            <a href="{{route('portfolio.item', $work->link)}}">
            {{-- @todo --}
                <div class="work-img"><img class="lazy" data-src="/min/{{ $work->image }}" alt=""></div>
                <div class="work-footer">
                    <div class="work-footer-text">
                        <p>{{ $work->name }}</p>
                        <span>{{ $work->annotation }}</span>
                    </div>
                    <div class="icon">
                        <svg class="default-svg">
                        {{-- @todo folder dist --}}
                            <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <svg class="hover-svg">
                        {{-- @todo folder dist --}}
                            <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
