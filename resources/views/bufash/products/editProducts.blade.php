@extends('layouts.main')
@section('products')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
  </head>
  <body>
    <h1>Edit Product</h1>

    <form action="/Products/{{$bufashproducts->id}}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <input type="text" name="item_name" value="{{ $bufashproducts->item_name }}">
          <input type="text" name="item_type" value="{{ $bufashproducts->item_type }}">
          <input type="text" name="item_size" value="{{ $bufashproducts->item_size }}">
          <input type="text" name="item_qty" value="{{ $bufashproducts->item_qty }}">
          <input type="text" name="item_desc" value="{{ $bufashproducts->item_desc }}">
          <input type="text" name="item_price" value="{{ $bufashproducts->item_price }}">
          <input type="submit" name="updateProduct" value="update">
    </form>
  </body>
</html>
@endsection
