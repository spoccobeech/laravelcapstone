<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bufashproducts extends Model
{
    protected $fillable = ['prod_name', 'prod_type', 'prod_qty', 'prod_desc', 'prod_price' , 'updated_at', 'created_at'];
}
