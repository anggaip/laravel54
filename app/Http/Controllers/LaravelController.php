<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class LaravelController extends Controller
{
    public function index()
    {
    	$laravel = Category::findOrFail(2)->posts;
    	return view('frontend.pages.laravel', compact('laravel'));
    }

    public function show($id)
    {
    	$title = str_replace('-', ' ', $id);
    	$post = Post::where('title', $title)->first();

    	$posts = Category::find(2)->posts;
        //return view('frontend.pages.post_detail', compact(['post', 'posts']));
    }
}
