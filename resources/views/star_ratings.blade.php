<!-- star_ratings.blade.php -->
<ul class="meta-info mb-3">
    <li>
        <a href="javascript:void(0)"><img src={{URL::asset('assets/images/blog/comment1.jpg')}}
                alt="#">{{  Auth::user()->name}}</a>
    </li>
</ul>
<input type="text" name="commit" placeholder="Your Comments" id="commitText">
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
