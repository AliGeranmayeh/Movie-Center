<?php

namespace App\Http\Controllers\Show;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Show\Show;

class ShowController extends Controller
{
    public function show(Show $show)
    {
        $randomShows = Show::query()->inRandomOrder()->take(3)->get();
        return view('Show.show-detail',[
             'show' => $show,
             'randomShows' => $randomShows
        ]);
    }
}
