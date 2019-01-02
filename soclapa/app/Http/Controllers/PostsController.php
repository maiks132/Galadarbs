<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Post;
use Purifier;
//use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // return Post::where('title', 'Post Two')->get();
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        $posts = Post::orderBy('created_at', 'desc' )->where('published', '1')->paginate(12);
        // return view(Post::where('published', '1')->with('posts', $posts));
        // $posts = Post::orderBy('title', 'desc')->get();
        return view('posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if($request->input('save') == "Saglabāt"){
            $published = 0;
        }else if($request->input('save') == "Publicēt"){
            $published = 1;
        }else{
            $published = 0;
        }
            //echo $published;
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasfile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->published=$published;
        $post->save();

        return redirect('/blogaRaksti')->with('success', 'Raksts saglabāts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
         // Check for corect user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/raksti')->with('error', 'Neautorizēta piekļuve');
         }
         return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->input('save') == "Saglabāt"){
            $published = 0;
        }else if($request->input('save') == "Publicēt"){
            $published = 1;
        }else{
            $published = 0;
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'published' => 'boolean'
        ]);

        //Handle file upload
        if($request->hasfile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }
        

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        if($request->hasfile('cover_image')){
            if($post->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->published=$published;
        $post->save();    
        
        return redirect('/blogaRaksti')->with('success', 'Raksts atjaunots');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Check for corect user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/raksti')->with('error', 'Neautorizēta piekļuve');
        }
        if($post->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/blogaRaksti')->with('success', 'Raksts dzēsts');
    }
}
