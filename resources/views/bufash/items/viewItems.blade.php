@extends('layouts.main')
@section('products')
  <html>
    <head>
      <meta charset="utf-8">
      <title>Add Product</title>
    </head>
    <body>
      <h1>Products</h1>
      @foreach ($bufashItems as $bufashitem)
          <div class="col-md-3">
            <div class="">
              <div class="small-box bg-aqua">
                <img src="" alt="{{$bufashitem->item_image}}">
                <img class='img-thumbnail'>
                <div class="container">
                  <h3>{{$bufashitem->item_name}}</h3>
                      <h2>{{$bufashitem->item_type}}</h2> | <h2>{{$bufashitem->item_qty}}</h2>
                  <textarea name="description" class="col-md-3">{{$bufashitem->item_desc}}</textarea>
                </div>
                <div class="container-fluid">
                  @if ($bufashitem->id)
                    <form action="{{ url("/Items/$bufashitem->id") }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="/Items">
                            <input type="submit" name="deleteProduct" value="delete">
                        </a>
                    </form> |
                  @endif
                    <form class="" action="/Items/{{ $bufashitem->id }}/edit" method="GET">
                      <a>
                        <input type="submit" name="editProduct" value="edit">
                      </a>
                    </form>
                </div>
                <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
              </div>
            </div>
          </div>
      @endforeach
    </body>
  </html>
@endsection
