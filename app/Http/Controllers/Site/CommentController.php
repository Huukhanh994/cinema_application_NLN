<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Events\CommentEvent;

class CommentController extends Controller
{
    public function fetchComments()
    {
        $comments = Comment::all();

        return response()->json($comments);
    }

    public function postComments(Request $request)
    {
        $comment = Comment::create($request->all());

        event(new CommentEvent($comment));
        return response()->json('ok');
    }
}
