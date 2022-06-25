 @if ($products->hasPages())
    <nav class="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <li class="disabled page-item"><span class="page-link">«</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">«</a></li>
            @endif

            @foreach(range(1, $products->lastPage()) as $i)
                @if ($i == $products->currentPage())
                    <li class="active page-item"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">»</a></li>
            @else
                <li class="page-item" class="disabled"><span class="page-link">»</span></li>
            @endif
        </ul>
    </nav>
@endif