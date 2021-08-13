<?php

namespace App\Http\Controllers\SiteController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function index(){

        $categories=Category::with('subcategories')->where('status',1)->get();
        $brands=Brand::where('status',1)->get();
        $sliders=Slider::where('status','active')->get();
        // $cart=Cart::where('user_ip',request()->ip())->get();
        $data=Cart::where('user_ip',request()->ip())->get();
        return view('website.website',compact('categories','brands','sliders','data'));
    }
    public function subcategories($id){
       
        $brands=Brand::where('status',1)->get();
        $subcat=Subcategory::where('id',$id)->get('id');
        $products=Product::where('subcategory_id',$id)->get();
        $data=Cart::where('user_ip',request()->ip())->get();
        return view('website.site.subcategory',compact('brands','products','data'));
    }
    public function categories($id){
        $brands=Brand::where('status',1)->get();
        $allcategory=Category::where('status',1)->where('id',$id)->get();
        return view('website.site.allcategory',compact('brands','allcategory'));
    }
}
