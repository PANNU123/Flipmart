<?php

namespace App\Http\Controllers\Shipping;

use Illuminate\Http\Request;
use App\Models\Shippingdivision;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DivisionController extends Controller
{
    public function adddivision(){
        return view('admin.Shipping.Division.adddivision');
    }
    public function managedivision(){
        $division=Shippingdivision::orderBy('id','DESC')->get();
        return view('admin.Shipping.Division.managedivision',compact('division'));
    }

    public function savedivision(Request $request){
        $request->validate([
            'division_name' =>'required|unique:shippingdivisions,division_name'
        ]);
        $division=new Shippingdivision();
        $division->division_name=$request->division_name;
        $division->save();
        Toastr::success('Division added successfully!','Save',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function divisionstatus($id,$status){
            $division=Shippingdivision::find($id);
            $division->status=$status;
            $division->save();
            Toastr::info('Division status update Successfully!', 'Status', ["positionClass" => "toast-top-right"]);
            return Redirect()->back()->json(['message','success']);
            // return response()->json(['message','success']);
    }

    public function divisionedit($id){
        $division=Shippingdivision::find($id);
        return view('admin.Shipping.Division.editdivision',compact('division'));
    }
    public function divisionupdate(Request $request){
        $request->validate([
            'division_name' =>'required|unique:shippingdivisions,division_name'
        ]);
        $id=$request->id;
             Shippingdivision::find($id)->update([
            'division_name'=>$request->division_name,
        ]);
        Toastr::success('Division Update successfully!','Update',["positionClass" => "toast-top-right"]);
        return redirect()->route('manage-division');
    }
}
