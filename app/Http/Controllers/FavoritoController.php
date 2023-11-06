<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{



    public function index()
{
    $currentUser = auth()->user();

    // Obtener los posts favoritos del usuario autenticado
    $favoritePosts = $currentUser->posts;

    // $favoritePosts contiene la colección de posts marcados como favoritos para el usuario dado.
    return view('favorito.index', compact('favoritePosts'));
}


}
