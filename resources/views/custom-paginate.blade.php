@if ($paginator->hasPages())
    <nav class="pagination">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disable" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="pagination-link" aria-hidden="true">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.4" y1="6.8" x2="7.8" y2="11.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 2)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                </li>
            @else
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.4" y1="6.8" x2="7.8" y2="11.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 2)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disable" aria-disabled="true">
                        <span class="pagination-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item active" aria-current="page">
                                <span class="pagination-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination-item">
                                <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 7)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1.4" y1="1.8" x2="7.8" y2="6.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                </li>
            @else
                <li class="pagination-item disable" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pagination-link" aria-hidden="true">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 7)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1.4" y1="1.8" x2="7.8" y2="6.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif