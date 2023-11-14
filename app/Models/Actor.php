<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='actors';
    protected $guarded=false;

    public function films()
    {
        return  $this->belongsToMany(Film::class, 'film_actors', 'actor_id', 'film_id');
    }
}
