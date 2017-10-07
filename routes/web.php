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
    $prodDetails = App\bufashItems::all();
    return view('../bufash/products/productDetails', compact('prodDetails'));
    // return Response()->json(array('data' => $prodDetails));
});

Route::group(['middleware' => ['auth']], function (){
  Route::resource('Items', 'ItemsController');
});

Auth::routes();
Route::get('/homepage', 'HomeController@index');
