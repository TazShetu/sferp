@if ($paginator->hasPages())
    <ul class="kt-datatable__pager-nav" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" aria-hidden="true">
                    <i class="flaticon2-back"></i>
                </span>
            </li>
        @else
            <li>
                <a class="kt-datatable__pager-link kt-datatable__pager-link--prev" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="flaticon2-back"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page">
                            <span class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active">{{ $page }}</span>
                        </li>
                    @else
                        <li><a class="kt-datatable__pager-link kt-datatable__pager-link-number" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="kt-datatable__pager-link kt-datatable__pager-link--next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="flaticon2-next"></i>
                </a>
            </li>
        @else
            <li aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="kt-datatable__pager-link kt-datatable__pager-link--next kt-datatable__pager-link--disabled" aria-hidden="true">
                    <i class="flaticon2-next"></i>
                </span>
            </li>
        @endif
    </ul>
@endif



{{--@if ($paginator->hasPages())--}}
{{--    <ul class="pagination" role="navigation">--}}
{{--        --}}{{-- Previous Page Link --}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="page-item">--}}
{{--                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        --}}{{-- Pagination Elements --}}
{{--        @foreach ($elements as $element)--}}
{{--            --}}{{-- "Three Dots" Separator --}}
{{--            @if (is_string($element))--}}
{{--                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--            --}}{{-- Array Of Links --}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        --}}{{-- Next Page Link --}}
{{--        @if ($paginator->hasMorePages())--}}
{{--            <li class="page-item">--}}
{{--                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--@endif--}}
