<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bufashproducts extends Model
{
    protected $fillable = ['item_name', 'item_type', 'item_size', 'item_qty', 'item_desc', 'item_price' , 'updated_at', 'created_at'];
}
