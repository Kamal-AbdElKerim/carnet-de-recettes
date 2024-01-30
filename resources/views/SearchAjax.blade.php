@foreach ($posts as $item)
                            
                     
<div class="col-lg-6 col-md-6 col-12">
    <!-- Start Single Blog -->
    <div class="single-blog">
        <div class="blog-img">
            <a href="blog-single-sidebar.html">
                <img src="{{ asset('storage/' . $item->image) }}" alt="#">
            </a>
        </div>
        <div class="blog-content">
            <h4>
                <a href="blog-single-sidebar.html">{{ $item->title }}</a>
                
            </h4>
            <p>{!! Str::limit($item->bio, 200, '<a href="#">... [Read More]</a>') !!}</p>
            <div class="autor">
                <a href="javascript:void(0)"><img src="assets/images/blog/comment2.jpg"
                        alt="#"></a>
                <a href="javascript:void(0)" class="name">{{ $item->user->name}}</a>
                <ul class="meta-content">
                    <li>
                        <a href="javascript:void(0)">{{ $item->created_at }}</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">    {{ $item->created_at->diffForHumans() }}                                                </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Single Blog -->
</div>

@endforeach
<div class="pagination left blog-grid-page" id="ajax_search_pagination">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($posts->onFirstPage())
            <li class="disabled"><span>Prev</span></li>
        @else
            <li><a href="{{ $posts->previousPageUrl() }}">Prev</a></li>
        @endif

        {{-- Pagination Elements --}}
        @for ($page = 1; $page <= $posts->lastPage(); $page++)
            @if ($page == $posts->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $posts->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($posts->hasMorePages())
            <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
        @else
            <li class="disabled"><span>Next</span></li>
        @endif
    </ul>
</div>