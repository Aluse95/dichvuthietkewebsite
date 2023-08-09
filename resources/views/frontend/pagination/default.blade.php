
@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination m-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link d-flex align-items-center">
                        <span aria-hidden="true">
                            <img src="{{ asset('themes/frontend/website-service/images/icon-arr-pre.svg')}}" alt="icon pre">
                        </span>
                    </a>
                </li>
            @else
                <li class="page-item ">
                    <a class="page-link d-flex align-items-center" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">
                            <img src="{{ asset('themes/frontend/website-service/images/icon-arr-pre.svg')}}" alt="icon pre">
                        </span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item"><a class="page-link">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @php
                        $displayDots = true; // Biến để kiểm tra xem đã hiển thị dấu "..." chưa
                    @endphp
                    @foreach ($element as $page => $url)
                        @if ($page <= 7 || $page >= ($paginator->lastPage() - 2) || abs($page - $paginator->currentPage()) <= 1)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @elseif ($displayDots && (($page == 8 && $paginator->lastPage() > 10) || $page == $paginator->lastPage() - 3))
                            <li class="page-item disabled dots"><a class="page-link">...</a></li>
                            @php $displayDots = false; @endphp {{-- Đánh dấu đã hiển thị dấu "..." --}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item ">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">
                            <img src="{{ asset('themes/frontend/website-service/images/icon-arr-next.svg')}}" alt="icon next">
                        </span>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link">
                        <span aria-hidden="true">
                            <img src="{{ asset('themes/frontend/website-service/images/icon-arr-next.svg')}}" alt="icon next">
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
