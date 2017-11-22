@extends('layouts.main')
@section('itemPurchase')
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Purchase Item</title>
    </head>
    <body>
      <div class="container">
          @foreach($bufashItems as $bufashItem)
          <div class="col-md-6 col-sm-4">
              <div class="small-box bg-aqua">
                @if($bufashItem->id)
                  <img src="{{Storage::disk('local')->url($bufashItem->item_image)}}" style="width:50px;height:50px;"/>
                @endif
                <div class="container">
                  <h3>{{$bufashItem->item_name}}</h3>
                  <h2>{{$bufashItem->item_type}}</h2> | <h2>{{$bufashItem->item_qty}}</h2>
                  <textarea name="description" class="col-md-3" style="width:320px;height:50px;">{{$bufashItem->item_desc}}</textarea>
                </div>
                <div class="container">
                  @if($bufashItem->id)
                  <a href="{{url("/itemDetails/$bufashItem->id")}}">
                    <input type="submit" name="itemDetails" value="View this Item">
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
