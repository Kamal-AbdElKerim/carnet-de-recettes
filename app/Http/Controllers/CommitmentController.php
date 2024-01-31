<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Commitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommitmentController extends Controller
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
                    
    }
    // public function data_commit()
    // {
    //     $Commitment = Commitment::orderBy("id", "desc")->get();

    //        return view('data_commit',compact('Commitment')) ;        
    // }

    public function getCommentsJson($postId)
    {
        $comments = Commitment::where('posts_id', $postId)->orderBy("id", "ASC")->get();
    
        foreach ($comments as $comment) {
            $comment->user_name = $comment->user->name;
            $comment->date = $comment->created_at->diffForHumans();
        }
    
        return response()->json(['comments' => $comments]);
    }
    
    public function delete($commentId)
    {
        // Find the comment by ID
        $comment = Commitment::find($commentId);

        // Check if the comment exists
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        // Delete the comment
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }

    public function updateComment(Request $request, $commentId)
{
    // Validation if needed
    $request->validate([
        'new_comment' => 'required|string',
    ]);

    $comment = Commitment::find($commentId);
    if (!$comment) {
        return response()->json(['message' => 'Comment not found'], 404);
    }

    $comment->commit = $request->input('new_comment');
    $comment->save();

    return response()->json(['message' => 'Comment updated successfully']);
}



    /**
     * Store a newly created resource in storage.
     */
    public function addComment(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);
    
       
        $validatedData = $request->validate([
            'commit' => 'required',  
            'num' => 'required',  
        ]);
    
       
        $commitment = new Commitment();
        $commitment->commit = $validatedData['commit']; 
        $commitment->start = $validatedData['num']; 

        $commitment->User_id = Auth::id();
        $commitment->posts_id = $id; 

    
        $commitment->save();
    
      
        // session()->flash('commit_success');
        // return redirect()->back();
        return response()->json(['success' => true, 'message' => 'Comment added successfully']);

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
