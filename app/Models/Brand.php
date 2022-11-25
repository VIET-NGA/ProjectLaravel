<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guards = [];
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';

    public $timestamps = false;
}
