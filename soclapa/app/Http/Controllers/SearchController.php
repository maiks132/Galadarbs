<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipes;


class SearchController extends Controller
{
    public function search(Request $request){

    	// dd($request);
    	// echo($request->search);
    	$search = $request->search;
    	$data = Recipes::where('title', 'like', '%'.$search.'%')->orWhere('body', 'like', '%'.$search.'%')->orWhere('ingredients', 'like', '%'.$search.'%')->get();
    	// dd($data);
    	return view('search.index')->with('data', $data);
        }
}
