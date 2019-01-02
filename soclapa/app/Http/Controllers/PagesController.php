<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipes;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        // return view('pages.index', compact('title'));
        $recipes = Recipes::orderBy('created_at', 'desc')->where('published', '1')->take(5)->get();
        // dd($recipes);
        $rec = Recipes::all()->random(2);
        // dd($rec);
        $posts = Post::orderBy('created_at', 'desc')->where('published', '1')->take(6)->get();
        $receptes = Recipes::all()->random(9);

        return view('pages.index')->with('recipes', $recipes)->with('randoms', $rec)->with('posts', $posts)->with('receptes', $receptes);
    }
    public function about(){
        return view('pages.about');
    }
    // public function contact(){
        
    //     return view('pages.contact');
    // }
    // public function app(){
    //     return view('layouts.app');
    // }
    
    
}
