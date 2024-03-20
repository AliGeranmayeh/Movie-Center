<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use \Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $heros = Show::query()->inRandomOrder()->take(3)->get();
        $heros->map(fn ($hero) => $hero->description = Str::words($hero->description, 15, '...'));

        $trendingShows = Show::query()->inRandomOrder()->take(3)->get();

        $actionShows = Show::query()->orderBy('id','desc')->where('genere', 'action')->take(4)->get();

        $recentShows = Show::query()->orderBy('id','desc')->take(6)->get();

        return view('home', [
            'heros' => $heros,
            'actionShows' => $actionShows,
            'recentShows'=> $recentShows,
            'trendingShows'=> $trendingShows
        ]);
    }
}
