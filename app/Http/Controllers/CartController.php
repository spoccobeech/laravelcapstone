<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BufashItems;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cartItems = Cart::content();
      // return Response()->json(array('data' => $cartItems));
      // return view('bufash/items/itemCart', [
      //       'cartItems' => $cartItems,
      //    ]);
      return view('bufash/cart/itemCart', compact('cartItems'));
      // return View::make('bufash/items/itemCart')->with(compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $itemQuantity = 1;
      $bufashItems = BufashItems::findOrFail($id);
      $RemainItemQty = $bufashItems->item_qty - $itemQuantity;
      $shoppingCart = $itemQuantity++;
      // $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      $bufashItems->update($request->all());
      return Response()->json(array('data' => $addtoCart));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

/*
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
      // return Response()->json(array('data' => $cartItems));
      // return view('bufash/items/itemCart', [
      //       'cartItems' => $cartItems,
      //    ]);
      return view('bufash/cart/itemCart', compact('cartItems'));
      // return View::make('bufash/items/itemCart')->with(compact('cartItems'));
    }

    public function addCart(Request $request, $id)
    {
      $itemQuantity = 1;
      $bufashItems = BufashItems::findOrFail($id);
      $RemainItemQty = $bufashItems->item_qty - $itemQuantity;
      $shoppingCart = $itemQuantity++;
      // $bufashItems->item_qty = $bufashItems->item_qty - $itemQuantity;
      $addtoCart = Cart::add($id, $bufashItems->item_name, $shoppingCart, $bufashItems->item_price);
      $bufashItems->update($request->all());
      return Response()->json(array('data' => $addtoCart));
    }

    public function checkOut($id)
    {

    }
}
*/
