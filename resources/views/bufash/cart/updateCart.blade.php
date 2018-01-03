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
                    <tbody>
                      <form action="/itemCart/{{$cartItem->id}}" method="PUT">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="text" name="rowId" value="{{$cartItem->rowId}}">
                        <input type="text" name="item_name" value="{{$cartItem->name}}">
                        <input type="text" name="item_qty" value="{{$cartItem->qty}}">
                        <input type="text" name="item_price" value="{{$cartItem->price}}">
                        <button type="submit" class="btn btn-info">Update Cart</button>
                      </form>
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
