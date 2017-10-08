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

Route::get('/ProductDetails', function () {
    $itemDetails = App\BufashItems::all();
    // return view('../bufash/products/productDetails', compact('prodDetails'));
    return Response()->json(array('data' => $itemDetails));
});

Route::post('Items', function() {
  $path = $request->file($item_image)->store('ProductPics');
  return $path;
});

Route::resource('Items', 'ItemsController');
Route::group(['middleware' => ['auth']], function (){

});

Auth::routes();
Route::get('/homepage', 'HomeController@index');
