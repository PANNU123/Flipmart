<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'slug'=>'required',
            'model'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
            'quantity'=>'required',
            // 'thumbnail'=>'required',
            'short_description'=>'required',
        ];
    }
}
