<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        
        return view('backend.post.index',compact('posts'))->with('title','Post Page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags       = Tag::get();
        
        return view('backend.post.create',compact('categories','tags'))->with('title','Post Page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request, [
                    'title'       => 'required',
                    'category_id' => 'required',
                    'content'     => 'required',
                    'image'       => 'required'
                ]);
            
        $image              = $request->image;
        $newImage              = time().$image->getClientOriginalName();
        
        $post = Post::create([
                    'title'       => $request->title,
                    'slug'       => Str::slug($request->title),
                    'category_id' => $request->category_id,
                    'content'     => $request->content,
                    'image'       => 'public/upload/posts/'.$newImage,
        ]);
        $post->tags()->attach($request->tags);
        $image->move('public/upload/posts/',$newImage);
        
        Toastr::success('Post data has been added.');
        return Redirect::action('PostController@index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
