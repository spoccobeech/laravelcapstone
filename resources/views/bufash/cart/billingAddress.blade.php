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
        <a href="{{ url('/Checkout') }}">
          <button type="submit" name="button" class="btn btn-info">Proceed to Checkout</button>
        </a>
      </form>
    </div>
    <div class="col-md-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Item Name</th>
            <th scope="col">Item Quantity</th>
            <th scope="col">Item Price</th>
            <th scope="col">Item Size</th>
          </tr>
        </thead>
        <tbody>
            @foreach(Cart::content() as $shipInfo)
            <tr>
              @if($shipInfo->id)
                <td><img src="{{Storage::disk('local')->url($shipInfo->options->has('image') ? $shipInfo->options->image : '')}}" style="width:50px;height:50px;"/></td>
                <td>{{$shipInfo->name}}</td>
                <td>{{$shipInfo->qty}}</td>
                <td>{{$shipInfo->price}}</td>
                <td>{{$shipInfo->options->has('size') ? $shipInfo->options->size : ''}}</td>
              @endif
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>
@endsection
