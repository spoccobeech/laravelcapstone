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
  // Route::resource('Products', 'ProductsController');

  Route::get('/aboutUs', function () {
      return view('../bufash/aboutUspage');
      // return Response()->json;
  });

  Route::get('ItemsToShop', function() {
    $bufashItems = App\BufashItems::all();
    // return $item_image->response('jpg');

    return view('../bufash/items/purchaseItem', compact('bufashItems'));
    // return Response()->json(array('data' => $bufashItems));
  });

  Route::post('ItemsToShop', 'ItemsController@store');

  Route::get('itemDetails/{id}', function($id) {
      $itemDetails = App\BufashItems::findOrFail($id);
      return view('../bufash/items/itemDetails', compact('itemDetails'));
      // return Response()->json(array('data' => $itemDetails));
  });

  Route::group(['middleware' => ['auth']], function (){
      Route::resource('Items', 'ItemsController');

  });

  Auth::routes();
  Route::get('/homepage', 'HomeController@index');
