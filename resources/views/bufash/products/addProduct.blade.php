@extends('adminlte::page')
@section('products')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
  </head>
  <body>
    <h1>Add Product</h1>
    <form action="/Products" method='POST'>
        {{ csrf_field() }}
        <input type="text" name="prod_name" placeholder="Product name">
        <input type="text" name="prod_type" placeholder="Product Type">
        <input type="text" name="prod_qty"  placeholder="Quantity">
        <input type="text" name="prod_desc" placeholder="descripttion">
        <input type="text" name="prod_price" placeholder="product price">
        <input type="submit" name="addProduct">
    </form>
  </body>
</html>
@endsection
