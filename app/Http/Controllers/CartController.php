<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Cart;
  use App\BufashItems;
  use Illuminate\Support\Facades\View;

  class CartController extends Controller
  {
      public function checkCart()
      {
        $cartItems = Cart::content();
        // $bufashItems = BufashItems::find();
        // return view('bufash/cart/itemCart', compact('bufashItems'));
        // return View::make('bufash/items/itemCart')->with(compact('cartItems'));
        return Response()->json(array('data' => $cartItems));
      }

      public function addCart(Request $request, $id)
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

      public function checkOut($id)
      {

      }

      public function wishlist($id)
      {
        $bufashItems = BufashItems::find($id);
        $addWishlist = Cart::instance('default')->add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price, ['size' => $bufashItems->item_size ,'description' => $bufashItems->item_desc, 'image' => $bufashItems->item_image]);
        // return $addWishlist->toJson();
        return view('bufash/cart/wishlist', compact('addWishlist'));
        // return Response()->json(array('data' => $addWishlist));
        return $addWishlist->toJson();
      }
  }
