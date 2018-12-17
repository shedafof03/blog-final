<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::with('owner')->paginate();
        //return $posts;
        return view('welcome', compact('posts'));
    }

    public function post($slug, $id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
}
