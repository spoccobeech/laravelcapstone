<?php

  Route::get('/login', function () {
      return view('../auth/login');
  });

  Route::get('/register', function () {
      return view('../auth/register');
  });

  Route::get('/Billing', function () {
      return view('../bufash/cart/billingAddress');
  });

  Route::get('/', function () {
      return view('../bufash/homepage');
  });

  Route::get('/aboutUs', function () {
      return view('../bufash/aboutUspage');
      // return Response()->json;
  });

  Route::get('ItemsToShop', function() {
  $bufashItems = App\BufashItems::all();
    // return $item_image->response('jpg');
    // $content = Storage::get('$item_image');
    // return Response()->json(array('data' => $bufashItems));
   return view('../bufash/items/purchaseItem', compact('bufashItems'));
  });

  Route::get('itemInfo/{id}', function($id) {
    $itemInfo = App\BufashItems::find($id);
    return view('../bufash/items/itemInfo', compact('itemInfo'));
  });

  Route::get('itemCart', function() {
    $itemCart = App\BufashItems::all();
    return view('../bufash/cart/itemCart', compact('itemCart'));
  });

    Route::group(['middleware' => ['auth']], function (){

    Route::resource('Items', 'ItemsController');
    Route::resource('Cart', 'CartController');
    Route::resource('Shipping', 'ShippingController');

    // ------------------ CART CONTROLLER ----------------------------

    Route::get('itemCart/{id}', [
      'uses' => 'CartController@store'// 'CartController@addCart '
    ]);

    Route::get('Cart/{id}/edit', [
      'uses' => 'CartController@update'// 'CartController@addCart '
    ]);

    Route::get('Cart/{Cart}', [
      'uses' => 'CartController@destroy'// 'CartController@addCart '
    ]);

    // -------------------------------------------------------------------

    // ------------------ SHIPPING CONTROLLER ----------------------------
    Route::get('Shipping', [
      'uses' => 'ShippingController@index'
    ]);
  });


  Auth::routes();
  Route::get('/homepage', 'HomeController@index');
