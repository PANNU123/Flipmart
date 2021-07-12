<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.categroy.addcategory');
    }
    public function manageCategory(){
        $category=Category::OrderBy('id','DESC')->get();
        return view('admin.categroy.managecategory',compact('category'));
    }
    public function saveategory(Request $request){
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->category_slug=$this->slugify($request->category_name);
        $category->save();
        return redirect()->back()->with('success','Category Added Successfully');

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
