@extends('layouts.main')
@section('products')
  <html>
    <head>
      <meta charset="utf-8">
      <title>Add Product</title>
    </head>
    <body>
      <h1>Products</h1>
      <div class="col-md-6 col-sm-4">
        <div class="">
          <div class="small-box bg-aqua">
            <img src="../storage/app/images/itemImg_/{{$itemDetails->item_image}}" />
            <img class='img-thumbnail'>
            <div class="container">
              <h3>{{$itemDetails->item_name}}</h3>
              <h2>{{$itemDetails->item_type}}</h2> | <h2>{{$itemDetails->item_qty}}</h2>
              <textarea name="description" class="col-md-3" style="width:320px;height:50px;">{{$itemDetails->item_desc}}</textarea>
            </div>
            <div class="container">
              @if($itemDetails->id)
              <a href="{{url("/itemDetails/$itemDetails->id")}}">
                <input type="submit" name="itemDetails" value="Buy">
              </a> |
              <a href="#">
                <input type="submit" name="Wishlist" value="Add to Wishlist">
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
  @endsection
