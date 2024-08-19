<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  static function index()
    {
        $posts = Post::latest();

        if(request('search')) {
            $posts->where('name', 'like', '%' . request('search') . '%');
        }

        return view('home', [
            'posts' => $posts->get(),
        ]);
    }

    public  static  function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'address' => 'required|max:100',
            'message' => 'required|max:500',
        ]);

        Post::create($validate);

        return redirect('/')->with('success', 'Create new post successfuly');
    }

    public  static  function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'address' => 'required|max:100',
            'message' => 'required|max:500',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validate);

        return redirect('/')->with('success', 'Update post successfuly');
    }

    public static function destroy($id) {
        Post::destroy($id);

        return redirect()->back()->with('success', 'Delete post successfuly');
    }
}
