<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;
use App\Recipes;



class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
         // Check for corect user
        return view('dashboard.index')->with('lietotājs', $user_id); 
    }

    public function update(Request $request)
    {   
       $this->validate($request, [
            'profile_image' => 'image|nullable|max:1999',
            // 'password' => 'required',
            // 'new_password' => 'required|confirmed'
        ]);
        //Handle file upload
        if($request->hasfile('profile_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('profile_image')->storeAs('public/profile_image', $fileNameToStore);
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->name = $request->input('name');
        // $user->password = $request->input('password');
        if($request->hasfile('profile_image')){
            if($user->profile_image != 'default.jpg'){
                //delete image
                Storage::delete('public/profile_image/'.$user->profile_image);
            }
            $user->profile_image = $fileNameToStore;
        }

        // $password = auth()->user()->password;
        // if(Hash::check($request->password, $password))
        // {
        //     if(!Hash::check($request->new_password, $password))
        // {
        //     $user = User::find($user_id);
        //     $user->new_password = Hash::make($request->new_password);
        //     $user->save();
        //     return redirect('/profils')->with('success', 'Profils atjaunots!');
        // }else{
        //     return redirect('/profils')->with('error', 'Jaunā parole nevar būt tāda pati, kā vecā!');
        // }
        // }else{
        //     return redirect('/profils')->with('error', 'Jaunā parole nesakrīt!');
        // }
        
        $user->save();
            return redirect('/profils')->with('success', 'Profils atjaunots!');
    }

    // public function updatePassword(Request $request)
    // {   
    //     $this->validate($request, [
    //         'password' => 'required',
    //         'new_password' => 'required|confirmed'
    //     ]);
       
    //     $password = Auth::user()->password;
    //     if(Hash::check($request->password, $password))
    //     {
    //         if(!Hash::check($request->new_password, $password))
    //     {
    //         $user = User::find(Auth::id());
    //         $user->new_password = Hash::make($request->new_password);
    //         $user->save();
    //         return redirect('/profils')->with('success', 'Profile Updated');
    //     }else{
    //         return redirect('/profils')->with('error', 'Jaunā parole nevar būt tāda pati, kā vecā!');
    //     }
    // }else{
    //     return redirect('/profils')->with('error', 'Jaunā parole nesakrīt!');
    // }

        
        
        
    // }

    public function blogPosts()
    {   
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $raksti = $user->posts()->orderBy('updated_at', 'desc')->paginate(10);
        //dd ($raksti);
        return view('dashboard.blogPosts')->with('posts', $raksti);
    }
    public function recipePosts()
    {   
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $receptes = $user->recipes()->orderBy('updated_at', 'desc')->paginate(10);
        //dd ($user->recipes);
        return view('dashboard.recipePosts')->with('recipes', $receptes);
    }
}
