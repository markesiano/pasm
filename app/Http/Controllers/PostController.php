<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comunity;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',2)->get();
        $comunities = Comunity::all();
        return view('post.index', compact('posts','comunities'));
    }

    public function show(Post $post){

        return $post;

    }
}
