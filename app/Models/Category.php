<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guards =[
        'category_id', 'category_name', 'category_description', 'category_status'
    ];
    protected $table = 'tbl_category';
    protected $primaryKey  = 'category_id';

    public $timestamps = false;

}
