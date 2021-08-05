<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.categroy.addcategory');
    }
    public function manageCategory(){
        $category=Category::OrderBy('id','DESC')->get();
        return view('admin.categroy.managecategory',compact('category'));
    }
    public function savecategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->category_slug=$this->slugify($request->category_name);
        $category->save();
        Toastr::success('Category added successfully!','Save',["positionClass" => "toast-top-right"]);
        return redirect()->back();
        // return redirect()->back()->with('success','Category Added Successfully');
    }
    public function removecategory($id){
        Category::find( $id)->delete();
        Toastr::error('Category delete successfully!','Remove',["positionClass" => "toast-top-right"]);
        return redirect()->back();
        // return redirect()->back()->with('delete','Category Delete Successfully');
    }
    public function categorystatus($id,$status){
        $category=Category::find($id);
        $category->status=$status;
        $category->save();
        Toastr::info('Status update successfully!','Status',["positionClass" => "toast-top-right"]);
        return redirect()->back()->json(['message','success']);
        // return response()->json(['message','success']);

    }
    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.categroy.categoryedit',compact('category'));
    }
    public function updatecategory (Request $request){
        $id=$request->id;
        Category::find($id)->update([
            'category_name'=>$request->category_name,
            'category_slug'=>$this->slugify($request->category_name),
        ]);
        Toastr::info('Category update successfully!','Update',["positionClass" => "toast-top-right"]);
        return redirect()->route('manage-category');
        // return redirect()->route('manage-category')->with('success','Category Update Successfully');
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
