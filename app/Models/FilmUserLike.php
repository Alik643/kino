<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmUserLike extends Model
{
    use HasFactory;
    protected $table='film_user_likes';
    protected $guarded=false;
}
