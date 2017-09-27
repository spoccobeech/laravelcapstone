<?php
/*Route::group(['middleware::auth'], function () {
  Route::get('/home', function () {
      return view('../bufash/home');
  });
});*/
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

Route::group(['middleware' => ['auth']], function (){
  Route::resource('Products', 'ProductsController');
});

Auth::routes();
Route::get('/home', 'HomeController@index');


// Route::get('/Products', function () {
// return view('../bufash/products/productDetails');//, ['Product_name' => $prod_name, 'Product_type' => $prod_type, 'Product_quantity' => $prod_qty, 'Product_description' => $prod_desc, 'Product_price' => $prod_price]);
//->with(['Product_name' => $prod_name, 'Product_type' => $prod_type, 'Product_quantity' => $prod_qty, 'Product_description' => $prod_desc, 'Product_price' => $prod_price]);
