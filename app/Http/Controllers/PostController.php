<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comunity;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $userId = auth()->user()->id;

        $posts = Post::where('user_id', $userId)->get();

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


    public function edit(Post $post){
        $user_id = Auth::id();
        $categories = Category::all();
        return view('post.edit', compact('post', 'user_id', 'categories' ));

    }


    public function destroy(Post $post){


        $post->delete();

         return redirect()->route('post.indexPsicologo');


     }

    public function update(StorePostRequest $request, Post $post){

        $data = $request->all();


        $post->update($data);
        return redirect()->route('post.show', $post);


    }


    public function store(StorePostRequest $request)
{

    $post = new Post();
    $post->name = $request->input('name');
    $post->slug = $request->input('slug');
    $post->status = $request->input('status');
    $post->user_id = $request->input('user_id');
    $post->category_id = $request->input('category_id');
    $post->postable_type = $request->input('postable_type');
    $post->postable_id = $request->input('postable_id');

    if ($request->input('postable_type') === 'Articulo') {
        $post->extract = $request->input('extract');
        $post->body = $request->input('body');
    } elseif ($request->input('postable_type') === 'Video') {
        $post->descripcion = $request->input('descripcion');

        // Guarda el archivo del video y obtén su ruta
        $videoPath = $request->file('video_url')->store('posts', 'public');
        $videoUrl = Storage::url($videoPath);

        // Almacena la URL del video en el campo video_url de la base de datos
        $post->video_url = $videoUrl;
    }

    $post->save();

    if ($request->hasFile('file')) {
        // Guarda la imagen y obtén su ruta
        $imageUrl = Storage::put('posts', $request->file('file'), 'public');
        $post->image()->create([
            'url' => Storage::url($imageUrl)
        ]);
    }

    return redirect()->route('post.show', $post)->with('success', 'Post creado correctamente.');
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




public function markAsFavorite(Post $post, User $user)
{
    $userId = auth()->user();
    $userId->posts()->attach($post->id);
    return redirect()->back()->with('success', 'Post marcado como favorito.');
}

public function removeFromFavorites(Post $post, User $user)
{
    $userId = auth()->user();
    $userId->posts()->detach($post->id);
    return redirect()->back()->with('success', 'Post eliminado de favoritos.');
}


















}
