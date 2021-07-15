<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function manageSubcategory(){
        $subcategory=Subcategory::with('category')->get();
        // return $subcategory;
        return view('admin.Subcategory.manage_subcategory',compact('subcategory'));
    }
    public function addSubcategory(){

        $categories=Category::where('status',1)->OrderBy('category_name','ASC')->get();
         return view('admin.Subcategory.addsubcategory',compact('categories'));

    }
    public function savesubcategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories,subcategory_name'
        ]);
        $subcategory=new Subcategory();
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory added Successfully');
    }
    public function removesubcategory($id){
        Subcategory::find($id)->delete();
        return redirect()->back()->with('delete','Subcategory delete Sucessfully');

    }
    public function  subStatus($id,$status){
        $subcategory=Subcategory::find($id);
        $subcategory->status=$status;
        $subcategory->save();
        return response()->json(['message','success']);
    }

    public function active($cat_id){
        Subcategory::find( $cat_id)->update(['status'=>1]);
        return Redirect()->back()->with('status','Status successfully updated');
    }


    public function inactive($cat_id){
        Subcategory::find($cat_id)->update(['status'=>0]);
        return Redirect()->back()->with('status','status successfully update');
    }
    public function editSubcategory($id){
        $subcategory=Subcategory::find($id);
        $categories=Category::latest()->get();
        return view('admin.Subcategory.editsubcategory',compact('subcategory','categories'));
    }
    public function updateSubcategory(Request $request){
        $id=$request->id;
        Subcategory::find($id)->update([
           'category_id'=> $request->category_id,
           'subcategory_name'=>$request->subcategory_name,
        ]);
        return redirect()->route('manage-sub-category')->with('success','Category Update Successfully');

    }

}
