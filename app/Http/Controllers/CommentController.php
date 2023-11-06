<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    $comment = new Comment([
        'body' => $request->input('body'),
        'user_id' => auth()->user()->id,
    ]);

    $post->comments()->save($comment);

    return redirect()->route('post.show', $post);
}
}
