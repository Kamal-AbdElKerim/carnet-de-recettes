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
                        <h1 class="page-title">Recettes</h1>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Single Recettes</li>
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
                                    @auth
                                        
                                 
                                    <div class="mt-3">
                                        <div class="sidebar ">
                                            <!-- Start Single Widget -->
                                            <div class="widget search-widget">
                                                <form id="commentForm">
                                                   
           
                                                    <div id="star-ratings-container">

                                                    </div>

                                                    <h3 id="output">
                                                        <input type="text" id="num" value="0" style="display: none">
                                                    </h3>

                                                </form>
                                                <div id="star-ratings">

                                                </div>
                                            </div>
                                            </div>
                                            <!-- End Single Widget -->
                                         </div>
                                    @endauth
                                    @guest
                                    <div class="mt-3">
                     <h3 class="comment-reply-title">Leave a comment</h3>
                    <h3 class=" text-center px-5 ">you must to login</h3>
                    <div class="d-flex justify-content-center   mb-5">
                    <a class="btn btn-primary p-1" href="{{ route('login') }}">Log in</a>
                                    </div>
                                    </div>
                               @endguest
                                  
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
                      <!-- Default dropstart button -->
                  

                    
                     
                 
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
      
           

      loadStarRatings();
       
       
      
    
            // Function to load star ratings asynchronously
            function loadStarRatings() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("show-star-ratings", $post->id) }}',
                    success: function(response) {
                        // Append the loaded HTML to the container
                        if (response.html == 1) {
                            $('#star-ratings-container').html('');

                        }else{
                            $('#star-ratings-container').html(response.html);

                        }
                    },
                    error: function(error) {
                        console.error('Error loading star ratings:', error);
                    }
                });
            }
    
    </script>
    <script>
        
// script.js
 
// To access the stars
let stars = 
    document.getElementsByClassName("star");
let output = 
    document.getElementById("output");
 
// Funtion to update rating
function gfg(n) {
    remove();
    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        stars[i].className = "star " + cls;
    }
    output.innerHTML = `<input type="text" id="num"  value="${n}" style="display: none">`;
    console.log(n)
}
 
// To remove the pre-applied styling
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}
        var commentsRoute = "{{ route('comments.json', ['postId' => $post->id]) }}";
    
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
                if (item.start == 1) {
                    starRatingHtml = `
                        <div class="star-rating" >
                            <span  style="font-size: 3vh" onclick="gfg(1)" class=" one">★</span>
                            <span  style="font-size: 3vh" onclick="gfg(2)" class="">★</span>
                            <span  style="font-size: 3vh" onclick="gfg(3)" class="">★</span>
                            <span  style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                            <span  style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                            <h3 id="output"></h3>
                        </div>
                    `;
                }else if (item.start == 2){
                    starRatingHtml = `
                        <div class="star-rating" >
                            <span style="font-size: 3vh" onclick="gfg(1)" class=" two">★</span>
                            <span style="font-size: 3vh" onclick="gfg(2)" class=" two">★</span>
                            <span style="font-size: 3vh" onclick="gfg(3)" class="">★</span>
                            <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                            <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                            <h3 id="output"></h3>
                        </div>
                    `;
                }
                else if (item.start == 3){
                    starRatingHtml = `
                        <div class="star-rating" >
                            <span style="font-size: 3vh" onclick="gfg(1)" class=" three">★</span>
                            <span style="font-size: 3vh" onclick="gfg(2)" class=" three">★</span>
                            <span style="font-size: 3vh" onclick="gfg(3)" class=" three">★</span>
                            <span style="font-size: 3vh" onclick="gfg(4)" class="">★</span>
                            <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                            <h3 id="output"></h3>
                        </div>
                    `;
                }
                else if (item.start == 4){
                    starRatingHtml = `
                    <div class="star-rating" >
                            <span style="font-size: 3vh" onclick="gfg(1)" class="four">★</span>
                            <span style="font-size: 3vh" onclick="gfg(2)" class="four">★</span>
                            <span style="font-size: 3vh" onclick="gfg(3)" class="four">★</span>
                            <span style="font-size: 3vh" onclick="gfg(4)" class="four">★</span>
                            <span style="font-size: 3vh" onclick="gfg(5)" class="">★</span>
                            <h3 id="output"></h3>
                        </div>
                    `;
                }
                else if (item.start == 5){
                    starRatingHtml = `
                        <div class="star-rating">
                            <span style="font-size: 3vh" onclick="gfg(1)" class="five">★</span>
                            <span style="font-size: 3vh" onclick="gfg(2)" class="five">★</span>
                            <span style="font-size: 3vh" onclick="gfg(3)" class="five">★</span>
                            <span style="font-size: 3vh" onclick="gfg(4)" class="five">★</span>
                            <span style="font-size: 3vh" onclick="gfg(5)" class="five">★</span>
                            <h3 id="output"></h3>
                        </div>
                    `;
                }else{
                    starRatingHtml = ''
                }
                
                var listItem = document.createElement('li');
                listItem.innerHTML = `
                    <div class="comment-img">
                        <img src={{URL::asset('assets/images/blog/comment1.jpg')}} alt="img">
                    </div>
                    <div class="comment-desc">
                        <div class="desc-top">
                            <h6>${item.user_name}</h6><span class="date">${item.date}</span>
                            ${starRatingHtml}
                            

                            ${item.User_id === {{ Auth::check() ? Auth::user()->id : 'false' }} ? `
                            <button onclick="updateComment(${item.id})" class="reply-link border-0 mx-4"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button onclick="deleteComment(${item.id})" class="reply-link border-0"><i class="fa-solid fa-trash"></i></button>
                        ` : ''}

            </div>
            <p>${item.commit}</p>
                    </div>
                `;
    
                commentsList.appendChild(listItem);
            });
        }
    
        fetchComments();

        setInterval(function () {
            fetchComments();
        }, 60000); 
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('commentForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var commitText = document.getElementById('commitText').value;
            var num = document.getElementById('num').value;
            // console.log(num)
          
            var starElements = document.querySelectorAll('#f_star .star');
            var error = document.getElementById('error');

            if (commitText !== '' && num != 0) {
                
           

            // Send an Ajax request                                             
            axios.post("{{ route('add_comment', ['postId' => $post->id]) }}", {
                commit: commitText,
                num: num,
               
            })
            .then(function (response) {
                console.log(response.data.message);
                document.getElementById('commitText').value = '';

                document.getElementById('num').value = '0';
                error.innerHTML = '';
              
                starElements.forEach(function(span) {
                    // Remove all existing classes
                    span.className = '';
                

                    // Add the new class (e.g., 'newClass')
                    span.classList.add('star');
                });
                // document.getElementById('commentForm').scrollIntoView({ behavior: 'smooth' });
                var targetPosition = document.body.scrollHeight - 900;
                 window.scrollTo(0, targetPosition);
                 num.value = '';
                //  loadStarRatings();
                loadStarRatings();
                fetchComments();
     
 
               
            })
            .catch(function (error) {
                console.error(error.response.data.message);
            });
            
         }else{
          
            error.innerHTML = `<div class="alert alert-danger" role="alert">
                                                        is empty       
                                                            </div>`
        
         }
        });
        
    });
</script>
<script>
    
    // Assuming you have a function to delete comments
    function deleteComment(commentId) {
    axios.delete(`/delete-comment/${commentId}`)
        .then(function (response) {
            // Handle success, you can update the UI or show a success message
            console.log(response.data.message);

            // You may want to refresh the comments after deletion
            fetchComments();
            loadStarRatings();
        })
        .catch(function (error) {
            // Handle errors, you can show an error message
            console.error('Error deleting comment:', error);
        });
}


function updateComment(commentId) {
    // var newComment = prompt("Enter the new comment:");
    // var newRating = prompt("Enter the new rating:");
    axios.get(`/info-comment/${commentId}`)
    .then(function (response) {
        // Handle success
        console.log('Comment updated successfully:', response.data.commitment);
        $data = response.data.commitment ;
        

        
    $('#star-ratings').html(` <form id="commentForm_2">
        <ul class="meta-info mb-3">
                                        <li>
                                            <a href="javascript:void(0)"><img src={{URL::asset('assets/images/blog/comment1.jpg')}}
                                                    alt="#">{{  Auth::user()->name}}</a>
                                        </li>
     </ul>
     
        <input type="text" name="commit" placeholder="Your Comments" id="commitText" value="${$data.commit}">
    <button type="submit"><img src={{URL::asset('assets/images/send.png')}} alt=""></button>

    <div id="error">

    </div>
    
    <div class="" id="f_star">
        <span onclick="gfg(1)" class="star">★</span>
        <span onclick="gfg(2)" class="star">★</span>
        <span onclick="gfg(3)" class="star">★</span>
        <span onclick="gfg(4)" class="star">★</span>
        <span onclick="gfg(5)" class="star">★</span>
    
    </div> 
    </form>
    `);

    document.getElementById('commentForm_2').addEventListener('submit', function (event) {
            event.preventDefault();

            var newComment = document.getElementById('commitText').value;
            var newRating = document.getElementById('num').value;
            // console.log(num)
          
            var starElements = document.querySelectorAll('#f_star .star');
            var error = document.getElementById('error');
            if (newComment !== '' && newRating != 0) {

    axios.put(`/update-comment/${commentId}`, { new_comment: newComment, num1: newRating })
        .then(function (response) {
            // Handle success, you can update the UI or show a success message
            console.log(response.data.message);
            document.getElementById('commentForm_2').style.display = 'none';
            // You may want to refresh the comments after updating
            fetchComments();
        })
        .catch(function (error) {
            // Handle errors, you can show an error message
            console.error('Error updating comment:', error);
        });
    }else{
          
          error.innerHTML = `<div class="alert alert-danger" role="alert">
                                                      is empty       
                                                          </div>`
      
       }
    } )
    })
    .catch(function (error) {
        // Handle errors
        console.error('Error updating comment:', error);

        // Show user-friendly error message or take other actions
        // For example, display a notification to the user
    });


   
}


</script>



    
    @endsection