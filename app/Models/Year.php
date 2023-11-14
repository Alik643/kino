<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='years';
    protected $guarded=false;

    public function films()
    {
        return  $this->hasMany(Film::class);
    }
}
