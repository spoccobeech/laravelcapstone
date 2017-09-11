@extends('adminlte::page')
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
          <input type="text" name="prod_name" value="{{ $bufashproducts->prod_name }}">
          <input type="text" name="prod_type" value="{{ $bufashproducts->prod_type }}">
          <input type="text" name="prod_qty" value="{{ $bufashproducts->prod_qty }}">
          <input type="text" name="prod_desc" value="{{ $bufashproducts->prod_desc }}">
          <input type="text" name="prod_price" value="{{ $bufashproducts->prod_price }}">
          <input type="submit" name="updateProduct" value="update">
    </form>
  </body>
</html>
@endsection
