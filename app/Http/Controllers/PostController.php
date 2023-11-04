<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comunity;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',2)->get();
        $comunities = Comunity::all();
        return view('post.index', compact('posts','comunities'));
    }

    public function indexPsicologo()
    {
        // Obtén el ID del usuario autenticado
        $userId = auth()->user()->id;

        // Recupera los posts del usuario específico usando Eloquent
        $posts = Post::where('user_id', $userId)->get();

        // Pasa los posts a la vista
        return view('post.indexPsicologo', compact('posts'));
    }

    public function show(Post $post){
        $similares = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id )->latest('id')->take(4)->get();
        return view('post.show', compact('post', 'similares'));
    }

    public function create(){
        $user_id = Auth::id(); 
        $categories = Category::all();

        return view('post.create', compact('categories', 'user_id'));
    }


    public function store(Request $request)
    {
        // Lógica para validar y guardar campos generales del post
        $post = new Post();
        $post->name = $request->input('name');
        $post->slug = $request->input('slug');
        $post->status = $request->input('status');
        $post->User_id = $request->input('user_id');
        $post->category_id = $request->input('category_id');
        $post->postable_type = $request->input('postable_type');
        $post->postable_id = $request->input('postable_id');
    
        // Determinar el tipo de contenido (artículo o video)
        if ($request->input('postable_type') === 'Articulo') {
            $post->extract = $request->input('extract');
            $post->body = $request->input('body');
        } elseif ($request->input('postable_type') === 'Video') {
            $post->descripcion = $request->input('descripcion');
            $post->video_url = $request->input('video_url');
        }
    
        // Guardar el post
        $post->save();
    
        // Redireccionar o retornar una respuesta, según sea necesario
        return redirect()->route('post.show', $post);
    }

    public function calificar(Request $request, $postId)
    {
        $userId = auth()->user()->id;

        $post = Post::find($postId);

        $calificacionExistente = Calificacion::where('user_id', $userId)
            ->where('post_id', $post->id)
            ->first();

        if ($calificacionExistente) {
            $calificacionExistente->rating = $request->input('rating');
            $calificacionExistente->save();
        } else {
            $calificacion = new Calificacion();
            $calificacion->rating = $request->input('rating');
            $calificacion->user_id = $userId;
            $post->calificaciones()->save($calificacion);
        }

        $promedio = $post->calificaciones->avg('rating');
        
        $post->update(['calificacion' => $promedio]);

        return response()->json(['message' => 'Calificación guardada correctamente']);
    }


    public function  buscar_post(){
        $buscar = $_GET['buscar'];
        $datos = Post::where('name', 'LIKE','%'.$buscar.'%')->paginate(8);
        $datos->appends(['buscar' => $buscar]);
        return view('post.buscar', ['datos'=>$datos]);
    }
    

    


    /*
     public function markAsFavorite(Request $request, Post $post)
     {
         auth()->user()->markAsFavorite($post);
         return back()->with('success', 'Recurso marcado como favorito.');
     }
    */



     
   



}
