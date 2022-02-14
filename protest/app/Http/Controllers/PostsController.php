<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'topic' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        #auth()->user()->posts()->create($data);

        $imagePath = request('image')-> store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image -> save();

        auth()->user()->posts()->create([
            'topic'=> $data['topic'],
            'content' => $data['content'],
            'image' => $imagePath,
        ]);
        return redirect('/profile/' . auth()->user()->id);

    }

    public function show(\App\Models\Post $post)
    {
        return view('post.show', compact('post'));
    }

}
