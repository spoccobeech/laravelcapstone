<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class BufashItems extends Model implements Buyable
{
    protected $fillable = ['rowId', 'item_name', 'item_type', 'item_size', 'item_qty', 'item_stocks' , 'item_desc', 'item_price' , 'item_image', 'updated_at', 'created_at'];

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->item_name;
    }

    public function getBuyablePrice($options = null){
        return $this->item_price;
    }
}
