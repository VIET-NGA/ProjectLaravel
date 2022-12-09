<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name', 'slug', 'number', 'time', 'code', 'condition'
    ];
    protected $table = 'Coupons';

    public $timestamps = false;
}
