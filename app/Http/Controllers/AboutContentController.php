<?php

namespace App\Http\Controllers;

use App\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = DB::table('about_contents')->where('id','1' )->get();
        return view('layouts.about',['content'=>$content]);    
    }

    public function contact_page()
    {
        $content = DB::table('about_contents')->where('id','1' )->get();
        return view('layouts.contact',['content'=>$content]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutContent  $aboutContent
     * @return \Illuminate\Http\Response
     */
    public function show(AboutContent $aboutContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutContent  $aboutContent
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutContent $aboutContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutContent  $aboutContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AboutContent $aboutContent)
    {
      if(AboutContent::find(1)){
        $aboutContent = AboutContent::find(1);
        if ($request->user()->is_admin()) {
            $content = $request->input('body');  
            $aboutContent->about_content=$content;
            $aboutContent->save();
            return redirect('/about');
          } else {
            return redirect('/about')->withErrors('You have insufficient permisions')->withInput();
        }
      }else{
        if ($request->user()->is_admin()) {
          $content = $request->input('body');  
          $aboutContent->about_content=$content;
          $aboutContent->save();
          return redirect('/about');
        } else {
          return redirect('/about')->withErrors('You have insufficient permisions')->withInput();
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutContent  $aboutContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutContent $aboutContent)
    {
        //
    }

    public function update_about_banner(Request $request,AboutContent $aboutContent)
    {
    if(AboutContent::find(1)){
        $aboutContent = AboutContent::find(1);
        if ($files = $request->file('about_banner')) {
          // Define upload path
          $destinationPath = public_path('/banners/'); // upload path
          // Upload Orginal Image           
          $aboutBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
          $files->move($destinationPath, $aboutBanner);
          $insert['image'] = "$aboutBanner";

          $aboutContent->about_banner = "$aboutBanner";
          $aboutContent->save();


          return redirect('/about');
        }
      }else{
        if ($files = $request->file('about_banner')) {
          // Define upload path
          $destinationPath = public_path('/banners/'); // upload path
          // Upload Orginal Image           
          $aboutBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
          $files->move($destinationPath, $aboutBanner);
          $insert['image'] = "$aboutBanner";

          $aboutContent->about_banner = "$aboutBanner";
          $aboutContent->save();


          return redirect('/about');
        }
      }

  }

  public function update_contact_banner(Request $request,AboutContent $aboutContent)
  {
    if(AboutContent::find(1)){
      $aboutContent = AboutContent::find(1);
      if ($files = $request->file('contact_banner')) {
        // Define upload path
        $destinationPath = public_path('/banners/'); // upload path
        // Upload Orginal Image           
        $contactBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $contactBanner);
        $insert['image'] = "$contactBanner";

        $aboutContent->contact_banner = "$contactBanner";
        $aboutContent->save();


        return redirect('/contact');
      }
    }else{
      if ($files = $request->file('contact_banner')) {
        // Define upload path
        $destinationPath = public_path('/banners/'); // upload path
        // Upload Orginal Image           
        $contactBanner = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $contactBanner);
        $insert['image'] = "$contactBanner";

        $aboutContent->contact_banner = "$contactBanner";
        $aboutContent->save();


        return redirect('/contact');
      }
    }

  }
}
