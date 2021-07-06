@if ($paginator->hasPages())
    <ul class="pagination-block">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="not-active arrow">❮</a></li>
        @else
            <li><a class="arrow" href="{{ $paginator->previousPageUrl() }}" rel="prev">❮</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($paginator->currentPage() > 3 && $page === 2 && $paginator->lastPage() > 5)
                        <li><a class="not-active">...</a></li>
                    @endif

                    {{--  Show active page else show the first and last two pages from current page.  --}}
                    @if ($page == $paginator->currentPage())
                        <li><a class="active">{{ $page }}</a></li>
                    @elseif (($page === $paginator->currentPage() - 2 && $paginator->currentPage() == $paginator->lastPage()) || ($page === $paginator->currentPage() + 2 && $paginator->currentPage() == 1) || $page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->lastPage() || $page === 1 || $paginator->lastPage() < 6)
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif

                    @if ($page === $paginator->currentPage() + 2 && $paginator->currentPage() + 3 <= $paginator->lastPage() && $paginator->lastPage() > 5)
                        <li><a class="not-active">...</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="arrow" href="{{ $paginator->nextPageUrl() }}" rel="next">❯</a></li>
        @else
            <li><a class="not-active arrow">❯</a></li>
        @endif
    </ul>
@endif
