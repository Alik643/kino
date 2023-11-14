<?php


namespace App\Service;


use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $actorIds = $data['actor_ids'];
            unset($data['actor_ids']);
            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $film = Film::firstOrCreate($data);
            $film->actors()->attach($actorIds);
            $film->genres()->attach($genreIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $film)
    {
        try {
            DB::beginTransaction();
            if(isset($data['actor_ids'])) {
                $actorIds = $data['actor_ids'];
                unset($data['actor_ids']);
            }
            if(isset($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }
            if(isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $film->update($data);
            if(isset($actorIds)) {
                $film->actors()->sync($actorIds);
            }
            if(isset($genreIds)) {
                $film->genres()->sync($genreIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $film;
    }
}
