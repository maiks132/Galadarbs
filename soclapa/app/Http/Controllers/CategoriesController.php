<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Categorie;
use App\Recipes;

class CategoriesController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        //Create Ingredients
        $categorie = new Categorie;
        $categorie->title = $request->input('title');
        $categorie->save();

        return view('categories.create')->with('success', 'Post Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = str_replace('-', ' ', $id);
        $categories = Categorie::all();
        $categorie_id = Categorie::where('title', $title)->first();
        $recipes = Recipes::orderBy('created_at', 'desc' )->where('published','1')->where('categorie_id', $categorie_id->id)->paginate(10);

     
       

        return view('categories.show')->with('categories', $categories)->with('recipes', $recipes)->with('nosaukumi', $categorie_id);
    }
}
    