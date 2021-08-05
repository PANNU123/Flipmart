<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_name',
        'slug',
        'model',
        'buying_price',
        'selling_price',
        'special_price',
        'special_start',
        'special_end',
        'quantity',
        'video_url',
        'warranty',
        'warranty_duration',
        'warranty_conditions',
        'thumbnail',
        'galary',
        'short_description',
        'long_description',
        'status',
    ];
    public function  category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function  brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}

