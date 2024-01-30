<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
       
        $posts = Post::orderBy("id", "desc")->paginate(2);


        // foreach ($posts as  $value) {
        //       dd($value->image) ;
        // }
      
        // dd($categories);
        return view('index',compact('categories','posts')) ;

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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|min:5|confirmed', 
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create($validatedData);

        session()->flash('register_success');
        return redirect()->route('login');
    }
    

    /**
     * Display the specified resource.
     */
    public function store_login(Request $request)
    {
        $validatedData = $request->validate([
           
            'email' => 'required|email',
            'password' => 'required',

            
        ]);

        if (Auth::attempt($validatedData)) {
            session()->flash('login_success');

            return redirect()->route('index'); 
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput();
    }
        
    

    /**
     * Show the form for editing the specified resource.
     */
    public function singout()
    {
        Auth::logout();

        session()->flash('logout_success');
        
        return redirect()->route('index'); 
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
