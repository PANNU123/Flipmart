<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manageProduct(){
        $products=Product::OrderBy('id','DESC')->get();
        return view('admin.product.manageproduct',compact('products'));
      
    }
    public function addProduct(){
        $categories=Category::where('status',1)->OrderBy('category_name','ASC')->get();
        $brands=Brand::where('status',1)->OrderBy('brand_name','ASC')->get();
        return view('admin.product.addproduct',compact('categories','brands'));
    }
    public function showSbucategory($id){
        $subcategories=Subcategory::select('id','subcategory_name')->where('category_id',$id)->where('status',1)->get();
        // dd($subcategories);
        echo '<option >Select Subcategory</option>';
        foreach( $subcategories as $row){
            echo '<option value="'.$row->id.'">'.$row->subcategory_name.'</option>';
        }
    }

    public function saveProduct(Request $request){
        // return $request;
             
        // $thumbnail=$request->file('thumbnail');
        // $filex=$thumbnail->getClientOriginalExtension();
        // $fileName=date('Ymdhis.') . $filex;
        // Image::make($thumbnail)->save(public_path('fontend/img/product/').$fileName);

        $thumbnail=$request->file('thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
        Image::make($thumbnail)->resize(700,700)->save('fontend/img/product/'.$name_gen);
        $img_url='fontend/img/product/'.$name_gen;

        try{
            $gallary=[];
            if($request->hasFile('gallary')){
                $s=0;
                foreach($request->file('gallary') as $file){
                    $filex=hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                    $fileName=date('Ymdhis_').$s.'.' . $filex;
                    Image::make($file)
                    ->resize(700,700)
                    ->save(public_path('fontend/img/gallary/').$fileName);
                    $gallary[]=$fileName;
                    $s++;
                }
            }
            $products=Product::create([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'brand_id'=>$request->brand_id,
                'product_name'=>$request->product_name,
                'slug'=>$this->slugify($request->product_name),
                'model'=>$request->model,
                'buying_price'=>$request->buying_price,
                'selling_price'=>$request->selling_price,
                'special_price'=>$request->special_price,
                'special_start'=>$request->startdate,
                'special_end'=>$request->enddate,
                'quantity'=>$request->quantity,
                'video_url'=>$request->video_url,
                'warranty'=>$request->warranty,
                'warranty_duration'=>$request->warranty_duration,
                'warranty_conditions'=>$request->warranty_condition,
                'thumbnail'=>$img_url,
                'galary'=>json_encode($gallary),
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                'status'=>$request->status
                ]);
                return redirect()->route('add-product')->with('success','Category Update Successfully');  
        }catch(Exception $exception){
            dd($exception);
            return redirect()->back()->with('warning','Image did not upload successfully');
        }
        
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
