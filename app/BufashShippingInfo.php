<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BufashShippingInfo extends Model
{
    protected $fillable = ['id', 'HouseNo_BldgNo', 'Street', 'Zone', 'Town', 'State_or_Province', 'Country', 'ZipCode', 'updated_at', 'created_at'];
}
