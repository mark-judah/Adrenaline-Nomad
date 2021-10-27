<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\AboutContent;
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
    $posts = Post::where('active', '1')->orderBy('created_at', 'desc')->paginate(6);
    $content = DB::table('about_contents')->where('id','1' )->get();
    $slider = DB::table('slider_contents')->where('id','1' )->get();

    //$posts= DB::table('posts')->where('active','1' )->get();
    $title = 'Latest Posts';
    //return view('layouts.home')->withPost($posts)->withTitle($title);
    return view('layouts.home', ['posts' => $posts,'content'=>$content,'slider'=>$slider]);
  }
  //display in blog page
  public function index()
  {
    $posts = Post::where('active', '1')->orderBy('created_at', 'desc')->paginate(7);
    $about_content = DB::table('about_contents')->where('id','1' )->get();

    return view('layouts.posts.blogs', ['posts' => $posts,'about_content'=>$about_content]);

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
      return view('layouts.posts.create');
    } else {
      return redirect('/admin')->withErrors('You have insufficient permisions')->withInput();
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

    //for the blog banner
    if ($files1 = $request->file('blog_banner')) {
      // Define upload path
      $destinationPath1 = public_path('/banners/'); // upload path
      // Upload Orginal Image
      $postBanner = date('YmdHis') . "." . $files1->getClientOriginalExtension();
      $files1->move($destinationPath1, $postBanner);
      $insert['image'] = "$postBanner";
    }

    $post = new Post();
    $post->title = $request->get('title');
    $post->blog_thumbnail = "$postThumbnail";
    $post->slug_banner = "$postBanner";
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
    // return redirect('/blogs' . $post->slug)->withMessage($message);
    return redirect('/');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($slug,Request $request)
  {
    $post = Post::where('slug', $slug)->first();
    $comments = Comment::where('on_post', $post->id)->get();


    if ($post) {
      if ($post->active == false)
      return redirect('/')->withErrors('Requested page not found')->withInput();
    } else {
      return redirect('/')->withErrors('Requested page not found')->withInput();
    }
       return view('layouts.posts.show', ['posts' => $post,'comments'=>$comments]);

//      dd($request->visitor()->browser(),
//          $request->visitor()->url(),
//          $request->visitor()->device(),
//          $request->visitor()->ip(),
//          $request->visitor()->method(),
//          $request->visitor()->request(),
//          $request->visitor()->referer(),
//          $request->visitor()->languages(),
//          $request->visitor()->useragent(),
//          $request->visitor()->platform(),
//          $request->visitor()->useragent(),
//          $request->visitor()->url(),
//          $request->visitor()->url(),
//          $request->visitor()->url(),
//          $request->visitor()->url(),
//          $request->visitor()->url(),
//          $request->visitor()->url(),
//          $request->visitor()->url()
//      );




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
      return view('layouts.posts.edit')->with('post', $post);
    else {
      return redirect('/admin')->withErrors('You have insufficient permisions')->withInput();
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
      return redirect('edit/' . $post->slug)->withErrors($message)->withInput();
    } else {
      return redirect('edit/' . $post->slug)->withErrors('You have insufficient permisions')->withInput();
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
      return redirect('/')->withErrors('Post deleted successfuly')->withInput();
    } else {
      return redirect('edit/' . $post->slug)->withErrors('You have insufficient permisions')->withInput();
    }
  }

  public function update_slug_banner(Request $request)
  {
    $post_id = $request->input('post_id');
    $slug = $request->input('slug');

    $post = Post::find($post_id);

    if ($files = $request->file('slug_banner')) {
      // Define upload path
      $destinationPath = public_path('/banners/'); // upload path
      // Upload Orginal Image
      $slugBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
      $files->move($destinationPath, $slugBanner);
      $insert['image'] = "$slugBanner";

      $post->slug_banner = "$slugBanner";
      $post->save();


      return redirect($slug);
    }

  }
  public function update_banner(Request $request,AboutContent $aboutContent)
  {
    if(AboutContent::find(1)){
      $aboutContent = AboutContent::find(1);
      if ($files = $request->file('blog_banner')) {
        // Define upload path
        $destinationPath = public_path('/banners/'); // upload path
        // Upload Orginal Image
        $postBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $postBanner);
        $insert['image'] = "$postBanner";

        $aboutContent->blog_banner = "$postBanner";
        $aboutContent->save();


        return redirect('/blogs');
      }
    }else{
      if ($files = $request->file('blog_banner')) {
        // Define upload path
        $destinationPath = public_path('/banners/'); // upload path
        // Upload Orginal Image
        $postBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $postBanner);
        $insert['image'] = "$postBanner";

        $aboutContent->blog_banner = "$postBanner";
        $aboutContent->save();


        return redirect('/blogs');
      }
    }


  }


}
