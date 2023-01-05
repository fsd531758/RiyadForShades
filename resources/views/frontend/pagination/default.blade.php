@if ($paginator->hasPages())
<nav class="navigation pagination-a" aria-label="Page navigation">
    <ul class="pagination justify-content-end">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link" aria-label="Previous"><span class="bi bi-chevron-right"></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span class="bi bi-chevron-right"></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span  class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link arrow" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span class="bi bi-chevron-left"></a></li>
        @else
            <li class="page-item disabled"><span class="page-link arrow" aria-label="Next"><span class="bi bi-chevron-left"></span></li>
        @endif
    </ul>
</nav>
@endif