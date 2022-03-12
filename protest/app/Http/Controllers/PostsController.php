<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostsController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(5);

        return view('post.dashboard', [
            'post' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Category $cate)
    {
        $cateid = $cate->id;
        $data = request()->validate([
            'content' => 'required',
            'category_id' => 'required',
            'file' => 'required',
        ]);

        #auth()->user()->posts()->create($data);

        $imagePath = request('file')-> store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image -> save();

        auth()->user()->posts()->create([
            'content' => $data['content'],
            'category_id' => $data[$cateid],
            'file' => $imagePath,
        ]);
        return redirect('/profile/' . auth()->user()->id);

    }

    public function show(\App\Models\Post $post)
    {
        return view('post.show', compact('post'));
    }



}
