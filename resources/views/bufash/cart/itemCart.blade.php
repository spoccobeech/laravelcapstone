@extends('layouts.main')
@section('cart')
  <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Purchase Item</title>
      </head>
      <body>
                <div class="container">
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
                      @foreach(Cart::content() as $cartItem)
                      <tr>
                        <td><img src="{{Storage::disk('local')->url($cartItem->options->has('image') ? $cartItem->options->image : '')}}" style="width:50px;height:50px;"/></td>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->qty}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->options->has('size') ? $cartItem->options->size : ''}}</td>
                        <td>
                          @if ($cartItem->id)
                            <form action="{{ route('Cart.destroy', $cartItem->rowId) }}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                                <button type="submit" name="Delete" value="Delete Cart" class="btn btn-sm btn-danger">Delete Cart</button>
                            </form>
                          @endif
                        </td>
                        <td><a href="{{ url("Cart/{$cartItem->id}/edit") }}"> <button type="submit" name="updateCart" class="btn btn-sm btn-success">Update Cart</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <a href="{{ url('checkout') }}">
                    <button type="submit" name="Checkout" class="btn btn-sm btn-info pull-right">Proceed to Checkout</button>
                  </a>
              </div>
    </body>
  </html>
@endsection
