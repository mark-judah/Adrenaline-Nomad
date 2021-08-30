<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderContent;

class SliderContentController extends Controller
{
    public function update_slider(Request $request,SliderContent $sliderContent)
    {
      if(($request->file('home_slider1'))&&($request->file('home_slider2'))&&($request->file('home_slider3'))){
  
        if(SliderContent::find(1)){
          $sliderContent = SliderContent::find(1);
          $file1 = $request->file('home_slider1');
          $file2 = $request->file('home_slider2');
          $file3 = $request->file('home_slider3');
  
            // Define upload path
            $destinationPath = public_path('/sliders/'); // upload path
            // Upload Orginal Image           
            $slider_1 = date('YmdHis') . "." . $file1->getClientOriginalExtension();
            $slider_2 = date('YmdHis') . "." . $file2->getClientOriginalExtension();
            $slider_3 = date('YmdHis') . "." . $file3->getClientOriginalExtension();
  
            $file1->move($destinationPath, $slider_1);
            $file2->move($destinationPath, $slider_2);
            $file3->move($destinationPath, $slider_3);
  
            $insert['image'] = "$slider_1";
            $insert['image'] = "$slider_2";
            $insert['image'] = "$slider_3";
  
      
            $sliderContent->slider_1 = "$slider_1";
            $sliderContent->slider_2 = "$slider_2";
            $sliderContent->slider_3 = "$slider_3";
  
            $sliderContent->save();
      
      
            return redirect('/');
          
        }else{
          $file1 = $request->file('home_slider1');
          $file2 = $request->file('home_slider2');
          $file3 = $request->file('home_slider3');
  
            // Define upload path
            $destinationPath = public_path('/sliders/'); // upload path
            // Upload Orginal Image           
            $slider_1 = date('YmdHis') . "." . $file1->getClientOriginalExtension();
            $slider_2 = date('YmdHis') . "." . $file2->getClientOriginalExtension();
            $slider_3 = date('YmdHis') . "." . $file3->getClientOriginalExtension();
  
            $file1->move($destinationPath, $slider_1);
            $file2->move($destinationPath, $slider_2);
            $file3->move($destinationPath, $slider_3);
  
            $insert['image'] = "$slider_1";
            $insert['image'] = "$slider_2";
            $insert['image'] = "$slider_3";
  
      
            $sliderContent->slider_1 = "$slider_1";
            $sliderContent->slider_2 = "$slider_2";
            $sliderContent->slider_3 = "$slider_3";
  
            $sliderContent->save();
      
      
            return redirect('/');
        }
        
      }else{
        
      }
    }
}
