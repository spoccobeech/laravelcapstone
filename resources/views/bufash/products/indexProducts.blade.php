@extends('layouts.main')
@section('products')
  <html>
    <head>
      <meta charset="utf-8">
      <title>Add Product</title>
    </head>
    <body>
      <h1>Products</h1>
      @foreach ($bufashproducts as $bufashproduct)
          <div class="col-md-3">
            <div class="">
              <div class="small-box bg-aqua">
                <img src="{{$bufashproduct->prod_image}}" />
                <img class='img-thumbnail'>
                <div class="container">
                  <h3>{{$bufashproduct->item_name}}</h3>
                      <h2>{{$bufashproduct->item_type}}</h2> | <h2>{{$bufashproduct->item_qty}}</h2>
                  <textarea name="description" class="col-md-3">{{$bufashproduct->item_desc}}</textarea>
                </div>
                <div class="container">
                  @if ($bufashproduct->id)
                    <form action="{{ url("/Products/$bufashproduct->id") }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="/Products">
                            <input type="submit" name="deleteProduct" value="delete">
                        </a>
                    </form> |
                  @endif
                    <a href="/Products/{{ $bufashproduct->id }}/edit">
                      <input type="submit" name="editProduct" value="edit">
                    </a>
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
