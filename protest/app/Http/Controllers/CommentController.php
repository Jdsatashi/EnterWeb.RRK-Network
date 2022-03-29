<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function stores(Request $request, Post $post)
    {
        $data = request()-> validate([
            'writer' => 'required',
            'comment' => 'required'
        ]);
        $id = auth()->user()->id;

        $details = [
            'title' => 'Dear you, Mail from RRK network.',
            'body' => 'There is have a new comment on your post',
            'by' => $data['writer'],
        ];
        $mail = User::where('email', Auth::User()->email)->get('email');

        Mail::to($mail)->send(new TestMail($details));
        $post->comments()->create([
            'user_id' => $id,
            'writer' =>  $data['writer'],
            'comment' => $data['comment']
        ]);
        return back();
    }
}
