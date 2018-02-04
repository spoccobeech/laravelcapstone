@extends('layouts.main')
@section('cart')
<html>
  <head>
    <meta charset="utf-8">
    <title>Checkout</title>
  </head>
  <body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Item</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Shipping Address</th>
        </tr>
      </thead>
      <tbody>
        @foreach(Cart::content() as $shipInfo)
          <tr>
            @if ($shipInfo->id)
              <td>{{$shipInfo->name}}</td>
              <td>{{$shipInfo->qty}}</td>
              <td>{{$shipInfo->price}}</td>
              <td>{{$shipInfo->Zone}}</td>
            @endif
          @endforeach
          </tr>
      </tbody>
    </table>
    <div class="container">

    </div>
  </body>
</html>
@endsection
