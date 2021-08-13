<?php

namespace App\Http\Controllers\Shipping;

use Illuminate\Http\Request;
use App\Models\Shippingstate;
use App\Models\Shippingdistrict;
use App\Models\Shippingdivision;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class StateController extends Controller
{
    public function adddstate(){

        $division=Shippingdivision::orderBy('id','DESC')->get();
        return view('admin.Shipping.State.addstate',compact('division')); 
    }
    public function showdistrict($id){
        $subcategories=Shippingdistrict::select('id','district_name')->where('division_id',$id)->where('status',1)->get();
        // dd($subcategories);
        echo '<option >Select District</option>';
        foreach( $subcategories as $row){
            echo '<option value="'.$row->id.'">'.$row->district_name.'</option>';
        }
    }

    public function savedstate(Request $request){
        $request->validate([
            'division_id'=>'required',
            'district_id'=>'required',
            'state_name'=>'required'
        ]);
        
        $state=new Shippingstate();
        $state->dvision_id=$request->division_id;
        $state->district_id=$request->district_id;
        $state->state_name=$request->state_name;
        $state->save();
        Toastr::success('State added successfully!','Save',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
