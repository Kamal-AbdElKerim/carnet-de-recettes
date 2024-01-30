@extends('layouts.master')
@section('css')

@endsection

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Blog Single Sidebar</h1>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Single Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-details">
                            <div class="main-content-head">
                                <div class="meta-information">
                                  
                                    <!-- End Meta Info -->
                                    <div class=" d-flex  justify-content-between ">
                                    <ul class="meta-info">
                                        <li>
                                            <a href="javascript:void(0)"><img src="{{ asset('storage/' . $post->image) }}"
                                                    alt="#">{{ $post->user->name}}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="lni lni-calendar"></i> {{ $post->created_at }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="lni lni-tag"></i> {{ $post->categories->title }}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="lni lni-timer"></i>{{ $post->created_at->diffForHumans() }} </a>
                                        </li>
                                    </ul>
                                    <div>
                            
                                        @auth
                                            @if ($post->User_id === Auth::user()->id)
                                                <a class="btn btn-outline-primary" href="{{ route('update_post', $post->id) }}" role="button">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $post->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                <!-- Button trigger modal -->

  
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete : {{ $post->title }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-danger" href="{{ route('delete_post',$post->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Meta Info -->
                                    <h2 class="post-title mt-5">
                                        <a href="blog-single.html">{{ $post->title }}</a>
                                    </h2>
                                </div>
                                <div class="post-thumbnils">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="#">
                                </div>
                                <div class="detail-inner">
                                    <p>{{  $post->bio }}</p>
                                    <!-- post image -->

                                  
                                        <div class="icon">
                                            <i class="lni lni-quotation"></i>
                                        </div>
                                    <!-- Post Social Share -->
                                    <div class="post-social-media">
                                        <h5 class="share-title">Social Share</h5>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-facebook-filled"></i>
                                                    <span>facebook</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-twitter-original"></i>
                                                    <span>twitter</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-google"></i>
                                                    <span>google+</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-linkedin-original"></i>
                                                    <span>linkedin</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="lni lni-pinterest"></i>
                                                    <span>pinterest</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Share -->
                                </div>
                            </div>
                            <!-- Comments -->
                            <div class="post-comments">
                                <h3 class="comment-title"><span>Post comments</span></h3>
                                <ul class="comments-list" id="data_commit">


                                </ul>
                            
                                    <div class="mt-3">
                                        <form id="commentForm">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-box form-group">
                                                        <textarea  id="commitText" name="commit" class="form-control form-control-custom"
                                                            placeholder="Your Comments"></textarea>
                                                    </div>
                                                </div>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                                <div class="col-12">
                                                    <div class="button">
                                                        <button type="submit" class="btn">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="comments-list">
                                    <li class="children">
                                        <div class="comment-img">
                                            <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Rosalina Kelian</h6>
                                                <span class="date">15th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                            </p>
                                        </div>
                                    </li>
                               
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                     
                        <!-- Start Single Widget -->
                        <div class="widget popular-feeds">
                            <h5 class="widget-title">Popular Feeds</h5>
                            <div class="popular-feed-loop">
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                                        </a>
                                        <a href="javascript:void(0)" class="cetagory">Creative</a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Bringing Great Design
                                                Ideas To Completion</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                                        </a>
                                        <a href="javascript:void(0)" class="cetagory">Jobs</a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Live Life Smart And
                                                Focus On The Positive</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 24th March 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                                        </a>
                                        <a href="javascript:void(0)" class="cetagory">Marketing</a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">We’re currently
                                                acceping new projects.</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 30th Jan 2023</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                     
                 
                        <!-- Start Single Widget -->
                        <div class="widget help-call">
                            <h5 class="widget-title">Need Help?</h5>
                            <div class="inner">
                                <h3>
                                    Online Help!
                                    <span>+(123) 456-78-90</span>
                                </h3>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->

    @endsection

    @section('script')
    <script>
        var commentsRoute = "{{ route('comments.json') }}";
    
        function fetchComments() {
            var xhr = new XMLHttpRequest();
    
            xhr.open('GET', commentsRoute, true);
    
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var response = JSON.parse(xhr.responseText);
                    displayComments(response.comments);
                    console.log('Request successful:', response);
                } else {
                    console.error('Request failed with status:', xhr.status, xhr.statusText);
                    // Display a user-friendly error message if needed
                }
            };
    
            // Setup a callback for network errors
            xhr.onerror = function () {
                console.error('Network request failed');
                // Display a user-friendly error message if needed
            };
    
            // Send the request
            xhr.send();
        }
    
        function displayComments(comments) {
           
            var commentsList = document.getElementById('data_commit');
            commentsList.innerHTML =''
    console.log(comments)
            comments.forEach(function (item) {
                var listItem = document.createElement('li');
                listItem.innerHTML = `
                    <div class="comment-img">
                        <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                    </div>
                    <div class="comment-desc">
                        <div class="desc-top">
                            <h6>${item.user_name}</h6>
                            <span class="date">${item.date}</span>
                            <button onclick="children()" class="reply-link border-0 "><i class="lni lni-reply"> Reply</i></button>
                        </div>
                        <p>${item.commit}</p>
                    </div>
                `;
    
                commentsList.appendChild(listItem);
            });
        }
    
        fetchComments();
    </script>

    <!-- Add this script at the end of your Blade view file -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('commentForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var commitText = document.getElementById('commitText').value;

            // Send an Ajax request
            axios.post("{{ route('add_comment', ['postId' => $post->id]) }}", {
                commit: commitText,
            })
            .then(function (response) {
                // Handle success, you can update the UI or show a success message
                console.log(response.data.message);
                document.getElementById('commitText').value = '';

                fetchComments();
            })
            .catch(function (error) {
                // Handle errors, you can show an error message
                console.error(error.response.data.message);
            });
        });
    });
</script>

    
    @endsection