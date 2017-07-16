<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\Storage;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return View::make('admin.pages.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return View::make('admin.pages.post_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumbnail')) {

            $this->validate($request, [
                'thumbnail' => 'required|image|mimes:jpeg,jpg,gif,png,svg|max:2048',
                ]);
            
            $image = $request->thumbnail->getClientOriginalName();
            $imagename = time().'_'.str_replace(' ','_', $image);

            $request->thumbnail->storeAs('thumbnail', $imagename, 'public');

            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'thumbnail' => $imagename,
                'category_id' => $request->category,
                'user_id' => $request->user()->id,
                ]);
            return redirect()->route('posts.index')->with('status', 'a post has been created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findOrFail($id);
        $categories = Category::all();
        return response()->view('admin.pages.post_edit', compact(['data', 'categories']));
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
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->save();

        return redirect()->route('posts.index')->with('status', 'a post has been changed');
    }

    public function replace_thumbnail(Request $request, $id) 
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, [
                'thumbnail' => 'required|image|mimes:jpeg,jpg,gif,png,svg|max:2048',
                ]);
            
            $image = $request->thumbnail->getClientOriginalName();
            $imagename = time().'_'.str_replace(' ','_', $image);

            $img = Post::findOrFail($id);
            
            if (Storage::disk('public')->exists('thumbnail/'.$img->thumbnail)) {
                Storage::delete('thumbnail/'.$img->thumbnail);
            }

            $request->thumbnail->storeAs('thumbnail', $imagename, 'public');

            $thumbnail = Post::findOrFail($id);
            $thumbnail->thumbnail = $imagename;
            $thumbnail->save();

            return redirect()->back()->with('status', 'The thumbnail has beed changed');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thumb = Post::findOrFail($id);
        if (Storage::disk('public')->exists('thumbnail/'.$thumb->thumbnail)) {
            $delThumb = Storage::delete('thumbnail/'.$thumb->thumbnail);
        }
        
        Post::destroy($id);
        return back()->with('status', 'a post has been deleted');

        /*
        $delThumb = Storage::delete('storage/app/public/thumbnail/'.$thumb->thumbnail);
        if ($delThumb) {
            Post::destroy($id);
            return back()->with('status', 'a post has been deleted');
        } else {
            echo $thumb->thumbnail;
        }
        
        $delete = Post::destroy($id);
        if ($delete) {
            Storage::delete()
        }
        return back()->with('status', 'a post has been deleted'); */
    }
}
