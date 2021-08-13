<?php

namespace App\Http\Controllers\Shipping;

use Illuminate\Http\Request;
use App\Models\Shippingdistrict;
use App\Models\Shippingdivision;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DistrictController extends Controller
{
    public function adddistrict(){
        $division=Shippingdivision::orderBy('id','DESC')->get();
        return view('admin.Shipping.District.adddistrict',compact('division'));
    }
    public function savedistrict(Request $request){
        $request->validate([
            'district_name' => 'required|unique:shippingdistricts,district_name'
        ]);
        $district=new Shippingdistrict();
        $district->division_id=$request->division_id;
        $district->district_name=$request->district_name;
        $district->save();
        Toastr::success('District added successfully!','Save',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function managedistrict(){
        $district=Shippingdistrict::orderBy('id','DESC')->get();
        return view('admin.Shipping.District.managedistrict',compact('district'));
    }

    public function districtstatus($id,$status){
        $district=Shippingdistrict::find($id);
        $district->status=$status;
        $district->save();
        Toastr::info('District status update Successfully!', 'Status', ["positionClass" => "toast-top-right"]);
        return Redirect()->back()->json(['message','success']);
        // return response()->json(['message','success']);
    }
    public function removedistrict($id){
        Shippingdistrict::find($id)->delete();
        Toastr::error('District Delete Successfully!', 'Delete', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }
}
