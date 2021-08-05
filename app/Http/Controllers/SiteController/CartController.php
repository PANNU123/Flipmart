<?php

namespace App\Http\Controllers\SiteController;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function cartmodel(){
        $category=Category::get();
        return view('website.modalform.cartmodal',compact('category'));
    }
    public function showproduct( $id){
    
        $data = DB::table('products')
        ->where('products.id',$id)
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->get();
        foreach($data as $row){
        return json_encode($row);
     }
    }
    public function savecartproduct(Request $request){

        $check=Cart::where('product_id',$request->id)
                    ->where('size',$request->size)
                    ->where('user_ip',request()->ip())
                    ->where('color',$request->color)  ->first();

        if($check){
            $check=Cart::where('product_id',$request->id)->increment('quantity');
            return response()->json($check);
        }else{
        $cartProduct=new Cart();
        $cartProduct->product_id = $request->id;
        $cartProduct->product_name = $request->product_name;
        $cartProduct->selling_price = $request->product_price;
        $cartProduct->model = $request->product_model;
        $cartProduct->category_name = $request->product_cat_name;
        $cartProduct->brand_name = $request->product_brand;
        $cartProduct->size = $request->size;
        $cartProduct->color = $request->color;
        $cartProduct->quantity = $request->quantity;
        $cartProduct->image = $request->image;
        $cartProduct->user_ip = request()->ip();
        $cartProduct->save();
        // Toastr::error('Brand Delete successfully!', 'Delete', ["positionClass" => "toast-top-right"]);
        return response()->json($cartProduct);     
        }
    }

    public function ShoppingCart(){
        $brands=Brand::where('status',1)->get();
        $data = Cart::where('user_ip',request()->ip()) ->get();
        return view('website.Cart.managecart',compact('brands','data'));
        
    }
    public function cartDelete($id){
        Cart::findOrFail($id)->delete();
        Toastr::success('Cart Delete successfully!', 'Delete', ["positionClass" => "toast-top-right"]);
        return Redirect()->back();
    }
}
