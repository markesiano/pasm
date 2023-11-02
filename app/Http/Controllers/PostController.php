<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
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

        $similares = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id )->latest('id')->take(4)->get();

        return view('post.show', compact('post', 'similares'));


    }

    


    /*
     public function markAsFavorite(Request $request, Post $post)
     {
         auth()->user()->markAsFavorite($post);
         return back()->with('success', 'Recurso marcado como favorito.');
     }
    */



     
    public function  buscar_post(){
        $buscar = $_GET['buscar'];
        $datos = Post::where('name', 'LIKE','%'.$buscar.'%')->paginate(8);
        $datos->appends(['buscar' => $buscar]);

        return view('post.buscar', ['datos'=>$datos]);
    }
    



}
