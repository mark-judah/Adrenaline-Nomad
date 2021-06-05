<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\DB;


// note: use true and false for active posts in postgresql database
// here '0' and '1' are used for active posts because of mysql database

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  //display in home page
  public function fetch_blogs()
  {
    $posts = Post::where('active', '1')->orderBy('created_at', 'desc')->paginate(4);
    //$posts= DB::table('posts')->where('active','1' )->get();
    $title = 'Latest Posts';
    //return view('layouts.home')->withPost($posts)->withTitle($title);
    return view('layouts.home', ['posts' => $posts]);
  }
  //display in blog page
  public function index()
  {
    $posts = Post::where('active', '1')->orderBy('created_at', 'desc')->paginate(7);
    //$posts= DB::table('posts')->where('active','1' )->get();
    $title = 'Latest Posts';
    //return view('layouts.home')->withPost($posts)->withTitle($title);
    return view('layouts.blog', ['posts' => $posts]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Request $request)
  {
    // 
    if ($request->user()->can_post()) {
      return view('posts.create');
    } else {
      echo('You have not sufficient permissions for writing post');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(PostFormRequest $request)
  {
    request()->validate([
      'blog_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

    ]);
    //for the blog thumbnail
    if ($files = $request->file('blog_thumbnail')) {
      // Define upload path
      $destinationPath = public_path('/post_thumbnails/'); // upload path
      // Upload Orginal Image           
      $postThumbnail = date('YmdHis') . "." . $files->getClientOriginalExtension();
      $files->move($destinationPath, $postThumbnail);
      $insert['image'] = "$postThumbnail";
    }

    $post = new Post();
    $post->title = $request->get('title');
    $post->blog_thumbnail = "$postThumbnail";
    $post->body = $request->get('body');
    $post->slug = Str::slug($post->title);
    $post->author_id = $request->user()->id;

    if (isset($post->slug)) {
      // $duplicate = DB::table('posts')->where('slug',$post->slug)->get();
      $duplicate = Post::where('slug', $post->slug)->first();
      if ($duplicate) {
        return redirect('new-post')->withErrors('Title already exists.')->withInput();
      }
    }


    if ($request->has('save')) {
      $post->active = 0;
      $message = 'Post saved successfully';
    } else {
      $post->active = 1;
      $message = 'Post published successfully';
    }
    $post->save();
    // return redirect('/blog' . $post->slug)->withMessage($message);
    return redirect('/');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($slug)
  {
    $post = Post::where('slug', $slug)->first();
    // $post= DB::table('posts')->where('slug',$slug)->first();
    //dump($post);
    $data =  array();
    $data['posts'] = $post;

    if ($post) {
      if ($post->active == false)
       echo('requested page not found');

      $comments = $post->comments;
      $data['comments'] = $comments;
    } else {
      echo('requested page not found');
    }
    //return view('posts.show')->withPost($post)->withComments($comments);
    // return view('posts.show',[ 'post' => $post]);
    return view('posts.show', compact("data"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request, $slug)
  {
    $post = Post::where('slug', $slug)->first();
    if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
      return view('posts.edit')->with('post', $post);
    else {
     echo('you have not sufficient permissions');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    //
    $post_id = $request->input('post_id');
    $post = Post::find($post_id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $title = $request->input('title');
      $slug = Str::slug($title);
      $duplicate = Post::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $post_id) {
          return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
        } else {
          $post->slug = $slug;
        }
      }

      $post->title = $title;
      $post->body = $request->input('body');

      if ($request->has('save')) {
        $post->active = 0;
        $message = 'Post saved successfully';
        $landing = 'edit/' . $post->slug;
      } else {
        $post->active = 1;
        $message = 'Post updated successfully';
        $landing = $post->slug;
      }
      $post->save();
      echo($message);
    } else {
       echo('you have not sufficient permissions');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    $post = Post::find($id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $post->delete();
      echo ('Post deleted Successfully');
    } else {
      echo('Invalid Operation. You have not sufficient permissions');
    }
  }
}
