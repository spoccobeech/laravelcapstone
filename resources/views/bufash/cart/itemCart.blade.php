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
                  @if(Cart::count() == 0)
                    <p>cart is empty</p>
                  @elseif(Cart::count() >= 1)
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
                  <p class="pull-right"><b>Total:</b> Php {{ Cart::subtotal() }}</p>
                  <p class="pull-right"><b>Total:</b> Php {{ Cart::total() }}</p>
                  <a href="{{ url('/Shipping') }}">
                    <button type="text" class="btn btn-sm btn-info pull-right">Proceed to Billing Information</button>
                  </a>
                  @endif
                  <!-- PayPal Logo ><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/ph/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/ph/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" alt="Check out with PayPal" /></a></td></tr></table><!-- PayPal Logo -->
              </div>
    </body>
  </html>
@endsection
