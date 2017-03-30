@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a class="upl" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="up" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="upn" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@else
    <ul class="pagination">
        <li class="disabled"><span>&laquo;</span></li>
        <li class="active"><span>{{ 1 }}</span></li>
        <li class="disabled"><span>&raquo;</span></li>
    </ul>
@endif
<div style="width: 300px;background: #f5f5f5;border-radius: 10px;margin: 0 auto;padding: 10px;border: 1px dashed #3399ff;">
    <span>共 <span style="color: #3399ff;">{{$paginator->currentPage()}}</span> / <span style="color: #ff7000;">{{$paginator->lastPage()}}</span> 页</span><br>
    <span>有 <span style="color: #3399ff;">{{$paginator->count()}}</span> / <span style="color: #ff7000;">{{$paginator->total()}}</span> 条数据</span>
</div>

