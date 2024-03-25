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

        $comments = ($show->comments()->orderBy('id', 'desc')->get())
            ->map(
        fn($comment) =>
        $comment->setAttribute('author', User::find($comment->author_id)->name));


        return view('Show.show-detail', [
            'show' => $show,
            'randomShows' => $randomShows,
            'comments' => $comments
        ]);
    }

    public function createComment(Request $request, Show $show)
    {

        Comment::query()->create([
            'author_id' => auth()->user()->id,
            'show_id' => $show->id,
            'content' => $request->comment
        ]);

        return redirect()->route('show.detail', $show->id)->with(['comment_success' => 'comment added successfully']);
    }

    public function followShow(Show $show)
    {
        ($show->users->contains(auth()->user()->id)) ? 
            $show->users()->detach(auth()->user()->id) :
            $show->users()->attach(auth()->user()->id);

        return redirect()->route('show.detail', $show->id);
    }
}
