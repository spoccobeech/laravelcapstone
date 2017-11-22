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
    // $content = Storage::get('$item_image');
    // return Response()->json(array('data' => $bufashItems));
    return view('../bufash/items/purchaseItem', compact('bufashItems'));
  });

  // Route::post('itemDetails/{id}', 'ItemsController@showImage');

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

  /* Route::get('/itemDetails/{item_image}', function($item_image)
  {
    $path = resource_path() . '/storage/app/images/' . $$item_image;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    console.log($response);
  }); */

    // Route::post('ItemsToShop', 'ItemsController@showImage');
