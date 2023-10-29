<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorito extends Model
{
    use HasFactory;


    public function favoriteResources()
    {
        return $this->belongsToMany(Post::class, 'favorite_resource_user', 'user_id', 'resource_id')->withTimestamps();
    }

    public function markAsFavorite(Post $resource)
    {
        $this->favoriteResources()->attach($resource);
    }

    public function removeFromFavorites(Post $resource)
    {
        $this->favoriteResources()->detach($resource);
    }


}
