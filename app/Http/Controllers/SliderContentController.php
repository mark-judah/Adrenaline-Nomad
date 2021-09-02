<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderContent;
use Illuminate\Support\Str;


class SliderContentController extends Controller
{
    public function update_slider(Request $request,SliderContent $sliderContent)
    {
  
        if(SliderContent::find(1)){
          $sliderContent = SliderContent::find(1);
          $file1 = $request->file('home_slider1');
          $file2 = $request->file('home_slider2');
          $file3 = $request->file('home_slider3');
          $file4 = $request->file('home_slider4');
          $file5 = $request->file('home_slider5');
          $file6 = $request->file('home_slider6');
            // Define upload path
            $destinationPath = public_path('/sliders/'); // upload path
            // Upload Orginal Image        
            if($file1){
              $slider_1 = Str::random(9) . "." . $file1->getClientOriginalExtension();
              $file1->move($destinationPath, $slider_1);
              $insert['image'] = "$slider_1";
              $sliderContent->slider_1 = "$slider_1";

            } 
            if($file2){
              $slider_2 = Str::random(9) . "." . $file2->getClientOriginalExtension();
              $file2->move($destinationPath, $slider_2);
              $insert['image'] = "$slider_2";
              $sliderContent->slider_2 = "$slider_2";

            } 
            if($file3){
              $slider_3 = Str::random(9) . "." . $file3->getClientOriginalExtension();
              $file3->move($destinationPath, $slider_3);
              $insert['image'] = "$slider_3";
              $sliderContent->slider_3 = "$slider_3";

            }   
            if($file4){
              $slider_4 = Str::random(9) . "." . $file4->getClientOriginalExtension();
              $file4->move($destinationPath, $slider_4);
              $insert['image'] = "$slider_4";
              $sliderContent->slider_4 = "$slider_4";

            }   
            if($file5){
              $slider_5 = Str::random(9) . "." . $file5->getClientOriginalExtension();
              $file5->move($destinationPath, $slider_5);
              $insert['image'] = "$slider_5";
              $sliderContent->slider_5 = "$slider_5";

            }   
            if($file6){
              $slider_6 = Str::random(9) . "." . $file6->getClientOriginalExtension();
              $file6->move($destinationPath, $slider_6);
              $insert['image'] = "$slider_6";
              $sliderContent->slider_6 = "$slider_6";

            }   
            $sliderContent->save();
      
      
            return redirect('/');
          
        }else{
          $file1 = $request->file('home_slider1');
          $file2 = $request->file('home_slider2');
          $file3 = $request->file('home_slider3');
          $file4 = $request->file('home_slider4');
          $file5 = $request->file('home_slider5');
          $file6 = $request->file('home_slider6');
            // Define upload path
            $destinationPath = public_path('/sliders/'); // upload path
            // Upload Orginal Image        
            if($file1){
              $slider_1 = Str::random(9) . "." . $file1->getClientOriginalExtension();
              $file1->move($destinationPath, $slider_1);
              $insert['image'] = "$slider_1";
              $sliderContent->slider_1 = "$slider_1";

            } 
            if($file2){
              $slider_2 = Str::random(9) . "." . $file2->getClientOriginalExtension();
              $file2->move($destinationPath, $slider_2);
              $insert['image'] = "$slider_2";
              $sliderContent->slider_2 = "$slider_2";

            } 
            if($file3){
              $slider_3 = Str::random(9) . "." . $file3->getClientOriginalExtension();
              $file3->move($destinationPath, $slider_3);
              $insert['image'] = "$slider_3";
              $sliderContent->slider_3 = "$slider_3";

            }   
            if($file4){
              $slider_4 = Str::random(9) . "." . $file4->getClientOriginalExtension();
              $file4->move($destinationPath, $slider_4);
              $insert['image'] = "$slider_4";
              $sliderContent->slider_4 = "$slider_4";

            }   
            if($file5){
              $slider_5 = Str::random(9) . "." . $file5->getClientOriginalExtension();
              $file5->move($destinationPath, $slider_5);
              $insert['image'] = "$slider_5";
              $sliderContent->slider_5 = "$slider_5";

            }   
            if($file6){
              $slider_6 = Str::random(9) . "." . $file6->getClientOriginalExtension();
              $file6->move($destinationPath, $slider_6);
              $insert['image'] = "$slider_6";
              $sliderContent->slider_6 = "$slider_6";

            } 
            $sliderContent->save();
      
      
            return redirect('/');
        }
        
     
    }
}
