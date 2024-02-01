@foreach ($posts as $item)
                            
                     
<div class="col-lg-6 col-md-6 col-12">
    <!-- Start Single Blog -->
    <div class="single-blog">
        <div class="blog-img">
            <a href="{{ route('Single_post',$item->id) }}">
                <img src="{{ asset('storage/' . $item->image) }}" alt="#" height="300px">
            </a>
        </div>
        <div class="blog-content">
            <h4>
                <a href="{{ route('Single_post',$item->id) }}" style="height: 50px">{{ Str::limit($item->title , 45) }}</a>
                @if ($item->Commitment->count() != 0)
                @if (round($item->Commitment->sum('start') / $item->Commitment->count()) == 1)
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="one">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
                @endif
                @if (round($item->Commitment->sum('start') / $item->Commitment->count()) == 2)
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="two">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="two">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
                @endif
                @if (round($item->Commitment->sum('start') / $item->Commitment->count()) == 3)
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="three">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="three">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="three">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
                @endif
                @if (round($item->Commitment->sum('start') / $item->Commitment->count()) == 4)
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="four">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="four">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="four">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="four">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
                @endif
                @if (round($item->Commitment->sum('start') / $item->Commitment->count()) == 5)
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="five">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="five">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="five">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="five">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="five">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
                @endif
                @else 
                <br><a href="{{ route('Single_post',$item->id) }}">
                    <div class="star-rating">
                        <span style="font-size: 3vh" onclick="gfg(1)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(2)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(3)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                        <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                        <span><h6>({{ $item->Commitment->count() }} Ratings)</h6></span>
                    </div>
                </a>
            @endif      
                
            </h4>
            <p  style="height: 120px">{!! Str::limit($item->bio, 200, '<a href="' . route('Single_post', $item->id) . '">... [Read More]</a>') !!}</p>
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