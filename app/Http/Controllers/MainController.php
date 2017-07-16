<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class MainController extends Controller
{
	public function __construct()
	{
		$this->middleware('validate');
	}

    public function index()
    {
    	$categories = Category::all();
    	return view('main', compact('categories'));
    }

    public function show($name)
    {
        $category = Category::where('category_name', $name)->firstOrFail();
        
        $posts = Post::where('category_id', $category->id)->get();
        return view('frontend.pages.post', compact(['posts', 'category']));
    }

    public function postDetail($category, $titleStr)
    {
        $title = str_replace('-', ' ', $titleStr);
        $posts = Post::where('title', $title)->firstOrFail();
        $category = Category::where('category_name', $category)->first();
        $related = Post::where('category_id', $category->id)->get();
        return view('frontend.pages.post_detail', compact(['posts', 'related', 'category']));
    }
}
