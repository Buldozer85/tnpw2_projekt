<?php

namespace App\Http\Controllers\Web;

use App\Enums\ShowType;
use App\Http\Controllers\Controller;
use App\Models\Show;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
        $newSeries = Show::query()
            ->where('type', '=', ShowType::SERIES->value)
            ->orderBy('date_of_premiere')
            ->limit(3)
            ->get();

        $newMovies = Show::query()
            ->where('type', '=', ShowType::MOVIE->value)
            ->orderBy('date_of_premiere')
            ->limit(3)
            ->get();



        return Inertia::render('Homepage')->with(['newSeries' => $newSeries, 'newMovies' => $newMovies]);
    }

    public function movies()
    {
        return Inertia::render('Movies');
    }

    public function showLogin()
    {
        return Inertia::render('Login');
    }

    public function showRegister()
    {
        return Inertia::render('Register');
    }

    public function movieDetail(Show $show)
    {
        return Inertia::render('Movie')->with(['movie' => $show]);
    }

    public function serialDetail(Show $show)
    {
        return Inertia::render('Serial')->with(['serial' => $show->with('reviews')->first(), 'description' => $show->getTrixRichText('description')]);
    }
}
