<?php

namespace App\Http\Controllers;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
      //on_post, from_user, body
      //$input['from_user'] = $request->user()->id;
      $input['name'] = $request->input('name');
      $input['on_post'] = $request->input('on_post');
      $input['body'] = $request->input('body');
      $slug = $request->input('slug');

      Comment::create( $input );
      return redirect($slug)->with('message', 'Comment published');     
    }
}
