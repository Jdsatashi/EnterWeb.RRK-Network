<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
    }

    public function index()
    {
        $date = new Carbon(request('date'));
        $post = Post::where('user_id', Auth::id())
            ->whereDate('created_at','=',$date)
            ->orderBy('created_at', 'DESC')
            ->paginate(3);

        return view('post.dashboard', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $req)
    {
        $data = request()->validate([
            'category_id' => ['required', Rule::exists('categories','id')],
            'author' => 'required',
            'content' => 'required',
            'file' => 'required',
        ]);
        #$file = print_r($req->file());
        #auth()->user()->posts()->create($data);

        $file = request('file')-> store('uploads','public');

        #$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        #$image -> save();

        auth()->user()->posts()->create([
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'author' => $data['author'],
            'file' => $file,
        ]);
        return redirect('/dashboard');
    }

    public function show(\App\Models\Post $post)
    {
        return view('post.show', compact('post'));
    }
}
