<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','product_name','category_name','brand_name','selling_price',
         'model','size','color','quantity','user_ip','image'
    ];
}
