<?php

namespace App\Http\Controllers\Web;

use App\Enums\Role;
use App\Enums\ShowType;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShowResource;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
        $shows = Show::count();

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



        $usersCount = User::query()->where('role', '!=', Role::ADMIN->value)->count();

        return Inertia::render('Homepage')->with([
            'newSeries' => $newSeries,
            'newMovies' => $newMovies,
            'showsCount' => $shows,
            'usersCount' => $usersCount
        ]);
    }

    public function movies()
    {
        $movies = Show::query()
            ->where('type', '=', ShowType::MOVIE->value)
            ->orderBy('date_of_premiere')
            ->paginate(10);


        return Inertia::render('Movies')->with(['movies' => $movies]);
    }

    public function series()
    {
        $series = Show::query()
            ->where('type', '=', ShowType::SERIES->value)
            ->orderBy('date_of_premiere')
            ->paginate(10);


        return Inertia::render('Series')->with([
            'series' => $series
        ]);

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
        return Inertia::render('Movie')->with([
            'movie' => new ShowResource($show),
            'previousURL' => route('movies.show'),
            'reviews' => $show->reviews()->with('user')->paginate(10)
        ]);
    }

    public function serialDetail(Show $show)
    {

        return Inertia::render('Serial')->with([
            'serial' => new ShowResource($show),
            'previousURL' => route('series.show'),
            'reviews' => $show->reviews()->with('user')->paginate(10)
        ]);
    }

    public function profile()
    {
        return Inertia::render('Profile');
    }

    public function leaderBoards()
    {
        $movies = Show::query()
            ->with('reviews')
            ->whereHas('reviews')
            ->where('type', '=', ShowType::MOVIE->value)
            ->limit(50)
            ->get()
            ->sortBy('reviews.rating');

        $series = Show::query()
            ->with('reviews')
            ->whereHas('reviews')
            ->where('type', '=', ShowType::SERIES->value)
            ->limit(50)
            ->get()
            ->sortBy('reviews.rating');

        return Inertia::render('Leaderboards')->with([
            'moviesRanking' => ShowResource::collection($movies),
            'seriesRanking' => ShowResource::collection($series)
        ]);
    }
}
