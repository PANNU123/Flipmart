<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.addbrand');
    }

    public function savebrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_slug= $this->slugify($request->brand_name);
        $brand->save();
        // return redirect()->back()->with("success",'Brand added Successfully!');
        Toastr::success('Brand added Successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function manageBrand(){
        $brand=Brand::Orderby('id','DESC')->get();
        return view('admin.brand.managebrand',compact('brand'));
    }


    public function active($cat_id){
        Brand::find( $cat_id)->update(['status'=>1]);
        // Toastr::success('Status active successfully !', 'Success', ["positionClass" => "toast-top-right"]);
        // return Redirect()->back();
        return Redirect()->back()->with('status','Status successfully updated');
    }
    public function inactive($cat_id){
        Brand::find($cat_id)->update(['status'=>0]);
        // Toastr::success('Status Inactive successfully!', 'warning', ["positionClass" => "toast-top-right"]);
        // return Redirect()->back();
        return Redirect()->back()->with('status','status successfully update');
    }
    public function brandremvoe($id){
        Brand::find( $id)->delete();
        Toastr::error('Brand Delete successfully!', 'Delete', ["positionClass" => "toast-top-right"]);
        return Redirect()->back();
        // return Redirect()->back()->with('delete','Brand Delete successfully');
    }
    public function editBrand($id){
        $brand=Brand::find($id);
        return view('admin.brand.brandedit',compact('brand'));

    }
    public function updateBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);
        // $brand=new Brand();
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_slug= $this->slugify($request->brand_name);
        // $brand->update();
        // return redirect()->route('manage-brand')->with("success",'Brand Update Successfully!');

        $id=$request->id;
        Brand::find( $id)->update([
            'brand_name'=>$request->brand_name,
            'brand_slug'=>$this->slugify($request->brand_name)
        ]);
        Toastr::success('Brand Update Successfully!', 'success', ["positionClass" => "toast-top-right"]);
        return Redirect()->route('manage-brand');
        // return redirect()->route('manage-brand')->with("success",'Brand Update Successfully!');

    }
    public function brandStatus($id,$status){
        $brand=Brand::find($id);
        $brand->status=$status;
        $brand->save();
        Toastr::info('Brand status update Successfully!', 'Status', ["positionClass" => "toast-top-right"]);
        return Redirect()->back()->json(['message','success']);
        // return response()->json(['message','success']);

    }



    public function slugify($text){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate divider
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
          return 'n-a';
        }
        return $text;
      }
}

