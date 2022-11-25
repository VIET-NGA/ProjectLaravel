<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guards = [];
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';

    public $timestamps = false;

    // category
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'category_id');
    }

    // brand
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','brand_id');
    }
}
