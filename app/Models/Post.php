<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'slug',
        'calificacion',
        'status',
        'user_id',
        'category_id',
        'postable_type',
        'postable_id',
        'extract',
        'body',
        'descripción',
        'video_url',
        'user_id' 
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    

    // RELACION MUCHOS A MUCHOS USER-FAVORITO
    public function users(){
        return $this->belongsToMany(User::class, 'post_user');
    }


    // RELACION UNO A MUCHOS POST-COMENTARIOS
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function postable()
    {
        return $this->morphTo();
    }


    public function calificaciones()
    {
        return $this->hasOne(Calificacion::class);
    }
    

    public function usuarioHaCalificado($userId)
    {
        return $this->calificacion()->where('user_id', $userId)->exists();
    }


}
