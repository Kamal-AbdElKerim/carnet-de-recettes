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


<form action="{{ route('updatePost',$post->id) }}" method="POST" enctype="multipart/form-data">
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
        <input type="text" name="title" class="form-control"  id="exampleFormControlInput1" placeholder="recettes" value="{{ old('title',$post->title) }}">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
        <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" placeholder="Bio" rows="3">{{ old('bio',$post->bio) }}</textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">image</label>
        <input class="form-control" type="file" name="image" id="formFile">
        <img class="my-4" src="{{ asset('storage/' . $post->image) }}" alt="" width="200px" height="200px">
      </div>
      <div class="mb-3">
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option value="" @if(!old('category_id')) selected @endif>Open this select menu</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" @if(old('category_id',$post->category_id) == $item->id) selected @endif>{{ $item->title }}</option>
            @endforeach
        </select>
        
    </div>
      <button type="submit" class="btn btn-success mt-4">Success</button>

</div>
</form>


@endsection
