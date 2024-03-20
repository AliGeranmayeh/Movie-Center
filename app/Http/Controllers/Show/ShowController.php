<?php

namespace App\Http\Controllers\Show;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Comment;
use App\Models\User;

class ShowController extends Controller
{
    public function show(Show $show)
    {
        $randomShows = Show::query()->inRandomOrder()->take(3)->get();

        $comments = ($show->comments()->orderBy('id','desc')->get())
            ->map(
        fn($comment) =>
        $comment->setAttribute('author', User::find($comment->author_id)->name));


        return view('Show.show-detail', [
            'show' => $show,
            'randomShows' => $randomShows,
            'comments' => $comments
        ]);
    }
}
