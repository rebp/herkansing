<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $posts = Post::all();
    $categories = Category::all();

    return view('public.index', compact('posts', 'categories', 'comments'));

    }

    public function category($category)
    {
        $category_name = Category::where('name', $category)->first();    

        $posts = Post::where('category_id', $category_name->id)->get();
    
        $categories = Category::all();
    
        return view('public.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments()->get();
        $categories = Category::all();
        
        return view('public.show', compact('post', 'comments', 'categories'));
    }

    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', '%'.$request->q.'%')->get();
        $categories = Category::all();
    
        return view('public.index', compact('posts', 'categories'));
    }

}
