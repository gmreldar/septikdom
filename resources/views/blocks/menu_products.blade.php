<div>
    <div class="hidden-box-menu"></div>
    <div class="box-menu" id="aside1">

        <div class="box-menu-elements" style="margin-top: 0">
            <div style="text-align: center; background-color: #34a844; color: white; padding: 11px">
                <h2>Септики</h2>
            </div>
            <div class="box-elements">
                <div>
                    @isset($menu_categorys1)
                        @foreach($menu_categorys1 as $p)
                            <p><a class="menu-link" href="{{route('catalog.category', $p->link)}}">{{ $p->short_name }}</a>
                            </p>
                        @endforeach
                    @endisset
                </div>
            </div>
            <div style="text-align: center; background-color: #34a844; color: white; padding: 11px">
                <h2>Погреба</h2>
            </div>
            <div class="box-elements">
                <div>
                    @isset($menu_categorys2)
                        @foreach($menu_categorys2 as $p)
                            <p><a class="menu-link" href="{{route('catalog.category', $p->link)}}">{{ $p->short_name }}</a>
                            </p>
                        @endforeach
                    @endisset
                </div>
            </div>
            <div style="text-align: center; background-color: #34a844; color: white; padding: 11px">
                <h2>Кессоны</h2>
            </div>
            <div style="padding: 10px 10px 10px 30px;">
                <div>
                    @isset($menu_categorys3)
                        @foreach($menu_categorys3 as $p)
                            <p><a class="menu-link" href="{{route('catalog.category', $p->link)}}">{{ $p->short_name }}</a>
                            </p>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>

        @include('blocks.promotions_vertical')
    </div>
</div>