<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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
        $slider=Slider::find($id);
        $images=json_decode($slider->image);
        foreach( $images as $row){
            unlink(public_path("fontend/img/upload/").$row );
        }
        $slider->delete();
       }catch(Exception $exception){
             return redirect()->back()->with('warning','Slider did not delete successfully');
       }
        return redirect()->back()->with('delete','Slider delete successfully');
    }
    public function saveSlider(Request $request){
            $request->validate([
            'title' => 'required|unique:sliders,title',
            'subtitle' => 'required',
            'image' => 'required',
            'url' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        /*********Iamge Upload*********/
        // $image=$request->file('image');
        // $filex=$image->getClientOriginalExtension();
        // $fileName=date('Ymdhis.') . $filex;
        // Image::make($image)->save(public_path('fontend/img/upload/').$fileName);

        /***********Multiple Image***********/
        try{
            $images=[];
            if($request->hasFile('image')){
                $s=0;
                foreach($request->file('image') as $file){
                    $filex=$file->getClientOriginalExtension();
                    $fileName=date('Ymdhis_').$s.'.' . $filex;
                    Image::make($file)
                    ->resize(250,250)
                    ->save(public_path('fontend/img/upload/').$fileName);
                    $images[]=$fileName;
                    $s++;
                }
            }
        }catch(Exception $exception){
            dd($exception);
            return redirect()->back()->with('warning','Image did not upload successfully');
        }

        // $img=$request->file('image');
        // $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        // Image::make($img)->resize(270,270)->save('fontend/img/upload/'.$name_gen);
        // $img_url='fontend/img/upload/'.$name_gen;
        /*********************************************/

        $slider=new Slider();
        $slider->title=$request->title;
        $slider->subtitle=$request->subtitle;
        $slider->url=$request->url;
        $slider->image=json_encode($images);
        $slider->start=$request->start_date;
        $slider->end=$request->end_date;
        $slider->save();
        return redirect()->back()->with('success','Slider Added Successfully');
    }
    public function editSlider($id){
        $slider=Slider::find($id);
        return view('admin.slider.editslider',compact('slider'));
    }
    public function updateSlider(Request $request){
        $request->validate([
            'title' => 'required|unique:sliders,title',
            'subtitle' => 'required|max:30',
            'image' => 'required',
            'url' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        try{
            $images=[];
            if($request->hasFile('image')){
                $s=0;
                foreach($request->file('image') as $file){
                    $filex=$file->getClientOriginalExtension();
                    $fileName=date('Ymdhis_').$s.'.' . $filex;
                    Image::make($file)
                    ->resize(250,250)
                    ->save(public_path('fontend/img/upload/').$fileName);
                    $images[]=$fileName;
                    $s++;
                }
            }
        }catch(Exception $exception){
            dd($exception);
            return redirect()->back()->with('warning','Image did not upload successfully');
        }
        $id=$request->id;
        // $image=json_encode($images);
        Slider::find($id)->update([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'image'=>json_encode($images),
            'url'=>$request->url,
            'start'=>$request->start_date,
            'end'=>$request->end_date,
        ]);
        return redirect()->route('manage-slider')->with('success','Category Update Successfully');
    }

}
