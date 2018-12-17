<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('owner')->paginate();
        //return $posts;
        return view('welcome', compact('posts'));
    }

    /**
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post($slug, $id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function publish()
    {
        return view('publish');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->image = '/uploads/' . $name;
        $post->body = $request->body;
        $post->user_id = \Auth::user()->id;
        $post->save();

        \Session::flash('class', 'alert-success');
        \Session::flash('message', 'Post published successfully');
        return back();
    }
}
