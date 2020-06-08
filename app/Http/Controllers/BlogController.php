<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->orderBy('created_at','desc')->get();
        // return view('blog',compact('posts'));
        return view('frontend.frontpage',compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('frontend.detailpage',compact('post'));
    }
   
}
