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
          @if($itemInfo->id)
            <img src="{{Storage::disk('local')->url($itemInfo->item_image)}}"/>
          @endif
          <div class="container">
            <h3>Item : {{$itemInfo->item_name}}</h3>
            <h2>Item Type :{{$itemInfo->item_type}}</h2>
            <h2>price :{{$itemInfo->item_price}}</h2>
            <h2>quantity :{{$itemInfo->item_qty}}</h2>
            <textarea name="description" class="col-md-3" style="width:320px;height:50px;">{{$itemInfo->item_desc}}</textarea>
          </div>
          <div class="container">
            @if($itemInfo->id)
            <a href="{{ url("/itemCart/{$itemInfo->id}") }}"> <!--  href="{{url("/itemInfo/$itemInfo->id")}}" {{url("/itemCart/{$itemInfo->id}")}}  -->
              <input type="submit" name="addCart" value="Add to Cart">
            </a> |
            <a href="{{ url("/wishlist") }}">
              <input type="submit" name="wishlist" value="Add to Wishlist">
            </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection
