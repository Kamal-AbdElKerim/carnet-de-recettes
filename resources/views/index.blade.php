@extends('layouts.master')


@section('content')





    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Blog Grid Sidebar</h1>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Singel Area -->
    
    <section class="section blog-section blog-list">
 
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
            <div class="single-blog">
                @auth
                <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="blog-img p-5">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">title recettes</label>
                        <input type="text" name="title" class="form-control"  id="exampleFormControlInput1" placeholder="recettes" value="{{ old('title') }}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                        <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" placeholder="Bio" rows="3">{{ old('bio') }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                      </div>
                      <div class="mb-3">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="" @if(!old('category_id')) selected @endif>Open this select menu</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if(old('category_id') == $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                      <button type="submit" class="btn btn-success mt-4">Success</button>

                </div>
            </form>
                @endauth
                @guest
                    <h3 class=" text-center px-5 pt-5 pb-2 ">you must to login</h3>
                    <div class="d-flex justify-content-center pt-2  mb-5">
                    <a class="btn btn-primary p-1" href="{{ route('login') }}">Log in</a>
                </div>
                @endguest

            
            </div>
        </div>

                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                       
                       
                        <!-- Start Single Widget -->
                        <div class="single-widget banner">
                            <a href="javascript:void(0)">
                                <img src="assets/images/banner.jpg" alt="#" height="520px">
                            </a>
                        </div>
                        <!-- End Single Widget -->
                      
                     
                    </div>
                </aside>
       
        </div>
            <!-- End Single Widget -->
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    
                    <div class="row">
                      
                        <div id="ajax_posts" class="row">
                        @foreach ($posts as $item)
                            
                     
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Start Single Blog -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="blog-single-sidebar.html">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="#" height="200px">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h4>
                                        <a href="{{ route('Single_post',$item->id) }}">{{ $item->title }}</a>
                                        
                                    </h4>
                                    <p>{!! Str::limit($item->bio, 200, '<a href="' . route('Single_post', $item->id) . '">... [Read More]</a>') !!}</p>
                                    <div class="autor">
                                        <a href="javascript:void(0)"><img src="assets/images/blog/comment2.jpg"
                                                alt="#"></a>
                                        <a href="" class="name">{{ $item->user->name}}</a>
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
                  
                        {{-- {!! $posts->links('pagination::bootstrap-5') !!} --}}
                        <div class="pagination left blog-grid-page" >
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
                    </div>
                    </div>
                  
                 

                    <!-- Pagination -->
                    {{-- <div class="pagination left blog-grid-page">
                        <ul class="pagination-list">
                            <li><a href="javascript:void(0)">Prev</a></li>
                            <li class="active"><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)">Next</a></li>
                        </ul>
                    </div> --}}
                    <!--/ End Pagination -->
                </div>
                
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title">Search This Site</h5>
                            <form action="#">
                                <input type="text" placeholder="Search Here..." id="SearchByTiltle">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                       
                        <!-- Start Single Widget -->
                        <div class="widget categories-widget">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="custom">
                                <li>
                                    <a href="javascript:void(0)">Web Design</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Branding</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Graphic Design</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Marketing</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Wireframing</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                      
                     
                    </div>
                </aside>
            </div>
        </div>
      

    </section>
    
    <!-- End Blog Singel Area -->
@section('script')


<script>
    $(document).ready(function(){
        searchByTitle('');

        $(document).on('input', '#SearchByTiltle', function() {
            var searchByTitleValue = $(this).val();
            searchByTitle(searchByTitleValue);
        });

        // Handle click on pagination links
        $(document).on('click', "#ajax_search_pagination a", function(e) {
            e.preventDefault();
            var searchByTitleValue = $('#SearchByTiltle').val();
            $.ajax({
                url: $(this).attr("href"),
                type: 'post',
                dataType: 'html',
                cache: false,
                data: { SearchByTiltle: searchByTitleValue, "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    $("#ajax_posts").html(data);
                },
                error: function() {}
            });
        });

        // Function to handle search by title
        function searchByTitle(value) {
            $.ajax({
                url: "{{ route('Ajax_Search') }}",
                type: 'post',
                dataType: 'html',
                cache: false,
                data: { SearchByTiltle: value, "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    $("#ajax_posts").html(data);
                },
                error: function() {}
            });
        }
    });
</script>
@endsection



    @endsection
