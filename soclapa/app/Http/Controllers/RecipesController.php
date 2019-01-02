<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Recipes;
use App\Categorie;
use Purifier;

class RecipesController extends Controller
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
        
        $recipes = Recipes::orderBy('created_at', 'desc' )->where('published', '1')->paginate(10);
        $categories = Categorie::all();

        return view('recipes.index')->with('recipes', $recipes)->with('categories', $categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        // dd($categories);
        return view('recipes.create')->with('categories', $categories);
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
            'recipe_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if($request->hasfile('recipe_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('recipe_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('recipe_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('recipe_image')->storeAs('public/recipe_image', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }




        //Create Post
        $recipe = new Recipes;
        $recipe->title = $request->input('title');
        $recipe->categorie_id = $request->input('cat');
        $recipe->ingredients = Purifier::clean($request->input('ing'));
        $recipe->body = Purifier::clean($request->input('body'));
        $recipe->user_id = auth()->user()->id;
        $recipe->recipe_image = $fileNameToStore;
        $recipe->published=$published;
        $recipe->save();

        return redirect('/recepsuRaksti')->with('success', 'Recepte izveidota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipes::find($id);
        $categories = Categorie::all();
            
        return view('recipes.show')->with('recipe', $recipe)->with('categories', $categories);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipes::find($id);
        $categories = Categorie::all();
        // Check for corect user
        if(auth()->user()->id !== $recipe->user_id){
            return redirect('/receptes')->with('error', 'Neautorizēta piekļuve');
        }
        
        return view('recipes.edit')->with('recipe', $recipe)->with('categories', $categories);
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
        if($request->hasfile('recipe_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('recipe_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('recipe_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('recipe_image')->storeAs('public/recipe_image', $fileNameToStore);
        }
        

        $recipe = Recipes::find($id);
        $recipe->title = $request->input('title');
        $recipe->categorie_id = $request->input('cat');
        $recipe->ingredients = Purifier::clean($request->input('ing'));
        $recipe->body = Purifier::clean($request->input('body'));
        if($request->hasfile('recipe_image')){
            if($recipe->recipe_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/recipe_image/'.$recipe->recipe_image);
            }
            $recipe->recipe_image = $fileNameToStore;
        }
        $recipe->published=$published;
        $recipe->save();    
        
        return redirect('/recepsuRaksti')->with('success', 'Recepte atjaunota');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipes::find($id);
        //Check for corect user
        if(auth()->user()->id !== $recipe->user_id){
            return redirect('/receptes')->with('error', 'Neautorizēta piekļuve');
        }
        if($recipe->recipe_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/recipe_image/'.$recipe->recipe_image);
        }

        $recipe->delete();
        return redirect('/recepsuRaksti')->with('success', 'Recepte dzēsta');
    }
}
