<?php

namespace App\Http\Controllers;

use App\BufashItems;
use App\BufashShippingInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Cart;
use Image;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{

    public function index()
    {
      $cartItems = BufashItems::all();
      // $bufashItems = BufashItems::find();
      return view('bufash/cart/itemCart', compact('cartItems'));
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
      $shopCart = $itemQuantity++;
      $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      $addtoCart = Cart::add($id, $bufashItems->item_name, $shopCart, $bufashItems->item_price, ['size' => $bufashItems->item_size ,'description' => $bufashItems->item_desc, 'image' => $bufashItems->item_image])->associate('BufashItems');
      $bufashItems->update($request->all());
      return view('bufash/cart/itemCart', compact('addtoCart'));
      // $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      // $cartItems = Cart::associate($addtoCart->rowId, 'BufashItems');
      // $bufashItems->update($request->all());
      // return Response()->json(array('data' => $addtoCart));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      return view('../bufash/cart/updateCart',compact('bufashItems'));
    }

    public function update(Request $request, $id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      $RowID = $bufashItems->rowId;
      // $bufashItems->update($request->all());
      $updateCart = Cart::update($RowID, $bufashItems->item_qty);
      // return Response()->json(array('data' => $updateCart));
      return redirect('/itemCart');
    }

    public function destroy($id)
    {
      //$bufashItems = BufashItems::findOrFail($id);
      //$bufashItems->delete();
      //Cart::destroy();
      // $RowID = $bufashItems->rowId;
      Cart::remove($id);
      return redirect('/itemCart');
      //return Response()->json("true");
    }

    public function itemWishlist(Request $request, $id)
    {
      $bufashItems = BufashItems::findOrFail($id);
      $itemQuantity = 1;
      $RemainItemQty = $bufashItems->item_qty - $itemQuantity;
      $shoppingCart = $itemQuantity++;
      $wishlist = Cart::instance('wishlist')->add($id, $bufashItems->item_name, $RemainItemQty, $bufashItems->item_price, ['size' => $bufashItems->item_size ,'description' => $bufashItems->item_desc, 'image' => $bufashItems->item_image])->associate('BufashItems');
      $bufashItems->update($request->all());
      return Response()->json(array('data' => $wishlist));
      // $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      // $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      // $cartItems = Cart::associate($addtoCart->rowId, 'BufashItems');
    }

    public function shippingInfo(Request $request)
    {

    }
}
