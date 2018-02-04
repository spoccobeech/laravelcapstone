@extends('layouts.main')
@section('itemPurchase')
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Purchase Item</title>
      <body>
    </head>
      <div class="container">
          @foreach($bufashItems as $bufashItem)
          <div class="col-md-6 col-sm-4">
              <div class="small-box bg-aqua">
                @if($bufashItem->id)
                  <img src="{{Storage::disk('local')->url($bufashItem->item_image)}}" style="width:50px;height:50px;"/>
                @endif
                <div class="container">
                  <h3>Item : {{$bufashItem->item_name}}</h3>
                  <h2>Item Type : {{$bufashItem->item_type}}</h2>
                  <h2>price : {{$bufashItem->item_price}}</h2>
                  @if($bufashItem->item_qty <= 0)
                  <p>out of stock</p>
                  @endif
                  <!--h2>Quantity :{{$bufashItem->item_qty}}</h2-->
                  <p name="description" class="col-md-3" style="width:320px;height:50px;">{{$bufashItem->item_desc}}</p>
                </div>
                <div class="container">
                  @if($bufashItem->id)
                  <a href="{{url("/itemInfo/$bufashItem->id")}}">
                    <input type="submit" name="show" value="View this Item">
                  </a>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </body>
  </html>
@endsection
