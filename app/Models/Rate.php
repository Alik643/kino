<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rates';
    protected $guarded=false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
