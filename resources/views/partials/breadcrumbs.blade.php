@if (count($breadcrumbs))

    <div class="breadcrumbs">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $key=>$breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ $breadcrumb->url }}">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                        </a>
                        <meta itemprop="position" content="{{ $key+1 }}"/>
                    </li>
                @else
                    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ $breadcrumb->url }}">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                        </a>
                        <meta itemprop="position" content="{{ $key+1 }}"/>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

@endif