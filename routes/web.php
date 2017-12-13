<?php

  Route::get('/login', function () {
      return view('../auth/login');
  });

  Route::get('/register', function () {
      return view('../auth/register');
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


  Route::group(['middleware' => ['auth']], function (){
      Route::resource('Items', 'ItemsController');

      Route::resource('Cart', 'CartController');
      /*
      Route::get('itemCart/{id}', [
         'uses' => 'CartController@addCart'// 'CartController@addCart '
      ]);

      Route::get('/itemCart', [
         'uses' => 'CartController@checkCart'// 'CartController@checkCart  ItemsController@getCart'
      ]);

      Route::get('/checkOutCart', [
         'uses' => 'CartController@checkOut'// 'CartController@checkCart  ItemsController@getCart'
      ]);
      */
  });

  Auth::routes();

  Route::get('/homepage', 'HomeController@index');
