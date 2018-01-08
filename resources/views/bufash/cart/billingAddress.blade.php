@extends('layouts.main')
@section('cart')
<html>
  <head>
    <meta charset="utf-8">
    <title>Checkout</title>
  </head>
  <body>
    <div class="row">
    <div class="col-md-8">
      <h2>Billing Address Information</h2>
      <form action="/Shipping" method='POST' enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" class="form-control" style="width:400px;" name="HouseNo_BldgNo" placeholder="House No. / Bldg No."><br/>
        <input type="text" class="form-control" style="width:400px;" name="Street" placeholder="Street"><br/>
        <input type="text" class="form-control" style="width:400px;" name="Zone" placeholder="Zone"><br/>
        <input type="text" class="form-control" style="width:400px;" name="Town" placeholder="Town"><br/>
        <input type="text" class="form-control" style="width:400px;" name="State_or_Province" placeholder="State / Province"><br/>
        <input type="text" class="form-control" style="width:400px;" name="Country" placeholder="Country"><br/>
        <input type="text" class="form-control" style="width:400px;" name="ZipCode" placeholder="Zip Code"><br/>
        <button type="submit" name="button" class="btn btn-info">Proceed to Checkout</button>
      </form>
    </div>
    <div class="col-md-4">
        @foreach(Cart::content() as $shipInfo)
          @if( $shipInfo->id )
            <img src="{{Storage::disk('local')->url($shipInfo->options->has('image') ? $shipInfo->options->image : '')}}" style="width:50px;height:50px;"/>
            <h3>{{ $shipInfo->name }}</h3>
            <h3>{{ $shipInfo->options->has('size') ? $shipInfo->options->size : ''}}</h3>
          @endif
        @endforeach
    </div>
  </div>
  </body>
</html>
@endsection
