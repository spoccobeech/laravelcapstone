<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BufashItems extends Model
{
    protected $fillable = ['item_name', 'item_type', 'item_size', 'item_qty', 'item_desc', 'item_price' , 'item_image', 'updated_at', 'created_at'];
}
