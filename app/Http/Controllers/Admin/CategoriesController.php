<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{

    public function index()
    {
    	$categories = Category::orderBy('category_name')->get();
    	return view('admin.pages.category', compact('categories'));
    }

    public function store(Request $request)
    {
    	Category::create([
    		'category_name' => $request->name,
    		]);

    	return back()->with('status', 'a Category Added');
    }

    public function edit($id)
    {
    	$category = Category::findOrFail($id);
    	return view('admin.pages.category_update', compact('category'));
    }

    public function update(Request $request, $id)
    {
    	$cat = Category::find($id);
    	$cat->category_name = $request->name;
    	$cat->save();

    	return redirect()->route('categories.index')->with('status', 'a Category has been Updated');
    }

    public function destroy($id)
    {
    	$category = Category::find($id);
    	if ($category->posts()->count() === 0) {
    		Category::destroy($id);
    		return redirect()->route('categories.index')->with('status', 'The category has been deleted');
    	} else {
			return redirect()->route('categories.index')->with('status', 'The category can\'t be deleted because have some posts');
    	}
    }
}
