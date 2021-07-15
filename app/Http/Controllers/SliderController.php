<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addSlider(){
        return view('admin.slider.addslider');
    }
    public function manageSlider(){
        $sliders=Slider::OrderBy('id','DESC')->get();
        return view('admin.slider.manageslider',compact('sliders'));
    }
    public function SliderStatus($id,$status){
        $slider=Slider::find($id);
        $slider->status=$status;
        $slider->save();
        return response()->json(['message','success']);
    }
    public function Slideremvoe($id){
       try{
           $id=base64_decode($id);
        $slider=Slider::find($id);
        unlink(public_path("fontend/img/upload/"). $slider->image);
        $slider->delete();
       }catch(Exception $exception){
             return redirect()->back()->with('warning','Slider did not delete successfully');
       }
        return redirect()->back()->with('delete','Slider delete successfully');
    }
    public function saveSlider(Request $request){
            $request->validate([
            'title' => 'required|unique:sliders,title',
            'subtitle' => 'required|max:30',
            'image' => 'required| mimes:jpg,jpeg,png,gif',
            'url' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $image=$request->file('image');
        $filex=$image->getClientOriginalExtension();
        $fileName=date('Ymdhis.') . $filex;
        Image::make($image)->save(public_path('fontend/img/upload/').$fileName);

        // $img=$request->file('image');
        // $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        // Image::make($img)->resize(270,270)->save('fontend/img/upload/'.$name_gen);
        // $img_url='fontend/img/upload/'.$name_gen;

        $slider=new Slider();
        $slider->title=$request->title;
        $slider->subtitle=$request->subtitle;
        $slider->url=$request->url;
        $slider->image=$fileName;
        $slider->start=$request->start_date;
        $slider->end=$request->end_date;
        $slider->save();
        return redirect()->back()->with('success','Slider Added Successfully');
    }

}
