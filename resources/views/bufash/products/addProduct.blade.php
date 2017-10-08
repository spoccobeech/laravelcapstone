@extends('layouts.main')
@section('products')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
  </head>
  <body>
    <h1>Add Product</h1>
    <form action="/Items" method='POST'>
        {{ csrf_field() }}
        <input type="text" name="item_name" placeholder="Item name">
        <input type="text" name="item_type" placeholder="Item Type">
        <input type="text" name="item_size"  placeholder="Item Size">
        <input type="text" name="item_qty"  placeholder="Item Quantity">
        <input type="text" name="item_desc" placeholder="Item Description">
        <input type="text" name="item_price" placeholder="Item Price">
        <input type="file" name="item_image"/>
        <input type="submit" name="addProduct">
    </form>
  </body>
</html>
@endsection
