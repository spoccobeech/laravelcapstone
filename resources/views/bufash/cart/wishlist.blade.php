@extends('layouts.main')
@section('wishlist')
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Purchase Item</title>
      <body>
    </head>
      <div class="container">
        @foreach(Cart::content() as $cartItem)
              <!--div class="small-box bg-aqua">
                @if($cartItem->id)
                  <img src="{{Storage::disk('local')->url($cartItem->item_image)}}" style="width:50px;height:50px;"/>
                @endif
              </div-->
                <!--div class="container">
                  <h3>Item : {{$cartItem->name}}</h3>
                  <h2>Item size : {{$cartItem->options->has('size') ? $cartItem->options->size : ''}}</h2>
                  <h2>price : {{$cartItem->price}} </h2>
                  <h2>quantity : {{$cartItem->qty}}</h2>
                  <textarea name="description" class="col-md-3" style="width:320px;height:50px;">{{$cartItem->item_desc}}</textarea>
                </div-->
                <div class="container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Quantity</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Item Size</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img src="{{Storage::disk('local')->url($cartItem->options->has('image') ? $cartItem->options->image : '')}}" style="width:50px;height:50px;"/></td>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->qty}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->options->has('size') ? $cartItem->options->size : ''}}</td>
                        <td><button type="submit" name="cancelCart" class="btn btn-sm btn-danger"> Delete Item </button></td>
                        <td><button type="submit" name="updateCart" class="btn btn-sm btn-success"> Update Item </button></td>
                      </tr>
                    </tbody>
                  </table>
                    <!--div class="container">
                      @if($cartItem->id)
                      <a href="{{ url('checkOut')}}">
                        <input type="submit" name="show" value="Proceed To Checkout">
                      </a>
                      <button type="submit" name="cancel" class="btn btn-danger">Cancel Cart</button>
                      @endif
                    </div-->
                  <!--table>
                    <tfoot class="container">
                      <tr>
                        <td>
                          @if($cartItem->id)
                          <a href="{{ url('checkOut')}}">
                            <input type="submit" name="show" value="Proceed To Checkout">
                          </a>
                          <button type="submit" name="cancel" class="btn btn-danger">Cancel Cart</button>
                          @endif
                        </td>
                      </tr>
                    </tfoot>
                  </table-->
              </div>
        </div>
    </body>
  </html>
  @endforeach
@endsection
