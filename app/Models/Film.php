<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='films';
    protected $guarded=false;

    protected $withCount = ['likedUsers'];

    public function rejisor()
    {
        return $this->belongsTo(Rejisor::class, 'rejisor_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'film_id', 'id');
    }

    public function actors(){
        return $this->belongsToMany(Actor::class, 'film_actors', 'film_id', 'actor_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
    }

    public function likedUsers(){
        return $this->belongsToMany(User::class, 'film_user_likes', 'film_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'film_id', 'id');
    }
}
