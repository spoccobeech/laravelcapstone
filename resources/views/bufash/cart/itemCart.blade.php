@extends('layouts.main')
@section('cart')
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Purchase Item</title>
      <body>
    </head>
      <div class="container">
          @foreach($cartItems as $cartItem)
          <div class="col-md-6 col-sm-4">
              <div class="small-box bg-aqua">
                @if($cartItem->id)
                  <img src="{{Storage::disk('local')->url($cartItem->item_image)}}" style="width:50px;height:50px;"/>
                @endif
                <div class="container">
                  <h3>Item : {{$cartItem->item_name}}</h3>
                  <h2>Item Type : {{$cartItem->item_type}}</h2>
                  <h2>price : {{$cartItem->item_price}}</h2>
                  <h2>quantity : {{$cartItem->item_qty}}</h2>
                  <textarea name="description" class="col-md-3" style="width:320px;height:50px;">{{$cartItem->item_desc}}</textarea>
                </div>
                <div class="container">

                </div>
              </div>
            </div>
            <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
          <div class="container">
            @if($cartItem->id)
            <a href="{{ url('checkOut')}}">
              <input type="submit" name="show" value="Proceed To Checkout">
            </a>
            <button type="submit" name="cancel" class="btn btn-danger">Cancel Cart</button>
            @endif
          </div>
          @endforeach
        </div>
    </body>
  </html>
@endsection
