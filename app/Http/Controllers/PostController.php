<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'bio' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

        $imagePath = $request->file('image')->storeAs('original_images', $imageName, 'public');

        $newImagePath = 'stock_images/' . $imageName;
        Storage::disk('public')->move($imagePath, $newImagePath);

        $validatedData['image'] = $newImagePath;

        $validatedData['user_id'] = Auth::id();



        // dd($validatedData);

        Post::create($validatedData);

        session()->flash('post_success');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
       
        return view('blog_single',compact('post')) ;
    }

    public function AjaxSearch(Request $request)
    {
        if ($request->ajax()) {
           $SearchByTiltle = $request->SearchByTiltle;
           $posts = Post::where("title","like","%{$SearchByTiltle}%")->orderby("id","desc")->paginate(2);
           return view('SearchAjax',compact('posts'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $post = Post::find($id);
        $categories = Categorie::all();

         return view('update_post',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $post = Post::find($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'bio' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        
      if ($request->file('image')) {
         $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

         $imagePath = $request->file('image')->storeAs('original_images', $imageName, 'public');
 
         $newImagePath = 'stock_images/' . $imageName;
         Storage::disk('public')->move($imagePath, $newImagePath);
 
         $validatedData['image'] = $newImagePath;
      }else {
        $validatedData['image'] = $post->image;

      }


      $post->update($validatedData);

        session()->flash('update_success');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $post = Post::find($id);
    
        if ($post) {
            $post->delete();
    
            session()->flash('delete_post');
            return redirect()->route('index');
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
    
}
