<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FavoritosPostController extends Controller
{
    

    public function showFavoritePosts(User $user)
    {
        $favoritePosts = $user->postFavorite;

        dd($favoritePosts);

        // $favoritePosts contiene la colección de posts marcados como favoritos para el usuario dado.
        return view('favorite_posts.index', compact('favoritePosts'));
    }



}
