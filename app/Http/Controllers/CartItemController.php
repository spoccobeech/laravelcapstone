<?php

namespace App\Http\Controllers;

use App\BufashItems;
// use App\BufashCart;
// use App\Http\Controllers\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Cart;
use Image;
use Illuminate\Support\Facades\DB;
use Session;
class CartItemController extends Controller
{

    public function index()
    {
      $cartItems = Cart::content();
      // $bufashItems = BufashItems::find();
      return view('bufash/cart/itemCart', compact('bufashItems'));
      // return View::make('bufash/items/itemCart')->with(compact('cartItems'));
      // return Response()->json(array('data' => $cartItems));
    }


    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      $itemQuantity = 1;
      $RemainItemQty = $bufashItems->item_qty - $itemQuantity;
      $shoppingCart = $itemQuantity++;
      // $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      // $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      // $cartItems = Cart::associate($addtoCart->rowId, 'BufashItems');
      $addtoCart = Cart::add($id, $bufashItems->item_name, $RemainItemQty, $bufashItems->item_price, ['size' => $bufashItems->item_size ,'description' => $bufashItems->item_desc, 'image' => $bufashItems->item_image])->associate('BufashItems');
      $bufashItems->update($request->all());
      // $bufashItems->update($request->all());
      // return Response()->json(array('data' => $addtoCart));
      return view('bufash/cart/itemCart', compact('addtoCart'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      $bufashItems->update($request->all());
    }


    public function destroy($id)
    {
        //
    }

    public function wishlist()
    {
      $bufashItems = BufashItems::findOrFail($id);
      $itemQuantity = 1;
      $RemainItemQty = $bufashItems->item_qty - $itemQuantity;
      $shoppingCart = $itemQuantity++;
      // $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      // $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      // $cartItems = Cart::associate($addtoCart->rowId, 'BufashItems');
      $addtoCart = Cart::add($id, $bufashItems->item_name, $RemainItemQty, $bufashItems->item_price, ['size' => $bufashItems->item_size ,'description' => $bufashItems->item_desc, 'image' => $bufashItems->item_image])->associate('BufashItems');
      $bufashItems->update($request->all());
    }
}
