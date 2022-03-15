<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function stores(Request $request, Post $post)
    {
        $data = request()-> validate([
            'writer' => 'required',
            'comment' => 'required'
        ]);
        $id = auth()->user()->id;
        $post->comments()->create([
            'user_id' => $id,
            'writer' =>  $data['writer'],
            'comment' => $data['comment']
        ]);
        return back();
    }
}
