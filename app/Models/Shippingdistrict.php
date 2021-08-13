<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingdistrict extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_id','district_name', 'status'  
     ] ;

     public function division(){
        return $this->belongsTo(Shippingdivision::class)->where('status',1);
    }
}
