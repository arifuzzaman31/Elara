<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
     	return view('admin.slider');
    } 

    public function allSlider()
    {
     	$sliderInfo = Slider::all();
     	return view('admin.allSlider')->with('sliderinfo',$sliderInfo);
    }  
    public function saveSlider(Request $request)
     {
     	$slider = new Slider;
     	if ($request->hasFile('sliderImage'))
     		$sliderImage = $request->file('sliderImage');
     		$extension   = $sliderImage->getClientOriginalExtension();
     		$imageName	 = time().'.'.$extension;
     		$sliderImage->move('upload/slider',$imageName);

     		$slider->sliderimage 		= $imageName;
     		$slider->publication_status = $request->publication_status;

     	if ($slider->save()) {
     		Session::flash('messege', 'Slider insert successfuly');
     		return redirect()->route('add-slider');
     	}
    }

    public function deleteSlider($id)
    {
        Slider::where('id',$id)->delete();
        return redirect()->route('all-slider');
    }

    public function inactiveSlider($id)
    {
        Slider::where('id',$id)->update(['publication_status' => 0]);
        return redirect()->route('all-slider');
    }

    public function activeSlider($id)
    {
        Slider::where('id',$id)->update(['publication_status' => 1]);
        return redirect()->route('all-slider');
    }

}
