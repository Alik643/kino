<?php


namespace App\Http\Controllers\Search;


use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {

            $films = Film::where('name', 'like', '%' . $request->search . '%')->orwhere('description', 'like', '%' . $request->search . '%')->paginate(5);


            $output = '';
            if (count($films) > 0) {

                $output = '<div>';

                foreach ($films as $film) {
                    $output .= '
                    <a href="' . route('films.show', $film->id) . '">
                    <div class="cat2" id="">
                        <div class="catimg"><img src="storage/' . $film->image . '" alt=""></div>
                        <div class="cattext">
                            <h2>' . $film->name . '</h2>
                            <h3>Year: ' . $film->year->year . '</h3>
                            <p>Director: ' . $film->rejisor->name . '</p>
                        </div>
                    </div>
                </a>';
                }


                $output .= '
    <div class="w-100 d-flex justify-content-center">
            '.$films->links().'
        </div>
                </div>';


            } else {

                $output .= '<h1 class="warning">No results</h1>';

            }

            return $output;

        }


    }
}
