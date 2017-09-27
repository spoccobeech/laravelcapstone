<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bufashproducts;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
class ShowProductsController extends Controller
{
      $bufashproducts = Bufashproducts::all();
      return view('bufash/products/productDetails', compact('bufashproducts'));
}
