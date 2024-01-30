<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        
        $imagePath = $request->file('image')->store('original_images', 'public');

        // Move the uploaded image to another directory (e.g., 'stock_images')
        $newImagePath = 'stock_images/' . $request->file('image')->getClientOriginalName();
        Storage::disk('public')->move($imagePath, $newImagePath);

        $validatedData['user_id'] = Auth::id();
        $validatedData['image'] = $newImagePath;



        // dd($validatedData);

        Post::create($validatedData);

        session()->flash('post_success');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function AjaxSearch(Request $request)
    {
        if ($request->ajax()) {
           $SearchByTiltle = $request->SearchByTiltle;
           $posts = Post::where("title","like","%{$SearchByTiltle}%")->orderby("id","ASC")->paginate(2);
           return view('SearchAjax',compact('posts'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
