<?php


namespace App\Http\Controllers\Films;


use App\Http\Controllers\Controller;
use App\Http\Filter\FilmFilter;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Rejisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $rejisors = Rejisor::all();
        $actors = Actor::all();
        $films = Film::query();


        if (isset($request->valueBy) && isset($request->filter) == false) {
            if ($request->valueBy == 'sbr') {
                $films = $films->with('rates')
                    ->select('films.*', DB::raw('AVG(rates.rate) as average_rate'))
                    ->leftJoin('rates', 'films.id', '=', 'rates.film_id')
                    ->groupBy('films.id')
                    ->orderBy('average_rate', 'desc');
            } else {
                $films = Film::query();
            }
        } elseif (isset($request->valueBy) && isset($request->filter)) {
            if ($request->valueBy == 'sbr') {
                if (isset($request->rejisor) && isset($request->actors)) {
                    $rejisor = $request->rejisor;
                    $actors = array_map('intval', $request->actors);
                    $filmsQuery = filmFilter::filterfilms($films, $rejisor, $actors);
                    $films = $filmsQuery->with('rates')
                        ->select('films.*', DB::raw('AVG(rates.rate) as average_rate'))
                        ->leftJoin('rates', 'films.id', '=', 'rates.film_id')
                        ->groupBy('films.id')
                        ->orderBy('average_rate', 'desc');
                } elseif (isset($request->actors) && isset($request->rejisor) == false) {
                    $actors = array_map('intval', $request->actors);
                    $filmsQuery = filmFilter::filterByActor($films, $actors);
                    $films = $filmsQuery->with('rates')
                        ->select('films.*', DB::raw('AVG(rates.rate) as average_rate'))
                        ->leftJoin('rates', 'films.id', '=', 'rates.film_id')
                        ->groupBy('films.id')
                        ->orderBy('average_rate', 'desc');
                } elseif (isset($request->rejisor) && isset($request->actors) == false) {
                    $rejisor = $request->rejisor;
                    $filmsQuery = filmFilter::filterByRejisor($films, $rejisor);
                    $films = $filmsQuery->with('rates')
                        ->select('films.*', DB::raw('AVG(rates.rate) as average_rate'))
                        ->leftJoin('rates', 'films.id', '=', 'rates.film_id')
                        ->groupBy('films.id')
                        ->orderBy('average_rate', 'desc');
                }
            } elseif ($request->valueBy == 'sbn') {
                if (isset($request->rejisor) && isset($request->actors)) {
                    $rejisor = $request->rejisor;
                    $actors = array_map('intval', $request->actors);
                    $filmsQuery = filmFilter::filterfilms($films, $rejisor, $actors);
                    $films = $filmsQuery->orderByDesc('year_id');
                } elseif (isset($request->actors) && isset($request->rejisor) == false) {
                    $actors = array_map('intval', $request->actors);
                    $filmsQuery = filmFilter::filterByActor($films, $actors);
                    $films = $filmsQuery->orderByDesc('year_id');
                } elseif (isset($request->rejisor) && isset($request->actors) == false) {
                    $rejisor = $request->rejisor;
                    $filmsQuery = filmFilter::filterByRejisor($films, $rejisor);
                    $films = $filmsQuery->orderByDesc('year_id');
                }
            }
        } elseif (isset($request->filter) && isset($request->valueBy) == false) {
            if (isset($request->rejisor) && isset($request->actors)) {
                $rejisor = $request->rejisor;
                $actors = array_map('intval', $request->actors);
                $filmsQuery = filmFilter::filterfilms($films, $rejisor, $actors);
                $films = $filmsQuery->orderByDesc('year_id');
            } elseif (isset($request->actors) && isset($request->rejisor) == false) {
                $actors = array_map('intval', $request->actors);
                $filmsQuery = filmFilter::filterByActor($films, $actors);
                $films = $filmsQuery->orderByDesc('year_id');
            } elseif (isset($request->rejisor) && isset($request->actors) == false) {
                $rejisor = $request->rejisor;
                $filmsQuery = filmFilter::filterByRejisor($films, $rejisor);
                $films = $filmsQuery->orderByDesc('year_id');
            }
        }
        $films = $films->orderByDesc('year_id');
        $films = $films->paginate(9);


        return view('films.index', compact('films', 'rejisors', 'actors'));
    }
}
