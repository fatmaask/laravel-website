<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;
use App\Comment;
use Auth;
class CommentsController extends Controller
{
    public function addComment(Request $request, Movie $movie_id)
    {
      //var_dump(Auth::user());
      $comment = new Comment;
      $comment->comment = $request->comment;
      $comment->user_id = $request->user_id;
      $movie_id->comments()->save($comment);
      return back();
    }
}
