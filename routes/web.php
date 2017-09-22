<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*Route::group(['middleware::auth'], function () {
  Route::get('/home', function () {
      return view('../bufash/home');
  });
});*/
Route::post('/login', function () {
    return view('../auth/login');
});
Route::get('/register', function () {
    return view('../auth/register');
});
Route::get('/', function () {
    return view('../bufash/homepage');
});
// Route::get('/Products', function () {
//    return view('../bufash/products/productDetails');//, ['Product_name' => $prod_name, 'Product_type' => $prod_type, 'Product_quantity' => $prod_qty, 'Product_description' => $prod_desc, 'Product_price' => $prod_price]);
    //->with(['Product_name' => $prod_name, 'Product_type' => $prod_type, 'Product_quantity' => $prod_qty, 'Product_description' => $prod_desc, 'Product_price' => $prod_price]);

Route::get('/aboutUs', function () {
    return view('../bufash/aboutUspage');
});

Route::group(['middleware' => ['auth']], function (){
  Route::resource('Products', 'ProductsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
