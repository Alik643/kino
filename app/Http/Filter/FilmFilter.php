<?php


namespace App\Http\Filter;


use App\Models\Film;

class FilmFilter
{
    public static function filterFilms($query, $rejisor, $actors)
    {
        if (!empty($rejisor)) {
            $query->where('rejisor_id', $rejisor);

        }

        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        return $query;
    }

    public static function filterByRejisor($query, $rejisor)
    {

        if (!empty($rejisor)) {
            $query->where('rejisor_id', $rejisor);
        }

        return $query;
    }

    public static function filterByActor($query, $actors)
    {

        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        return $query;
    }
}
