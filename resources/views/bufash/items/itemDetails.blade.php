@extends('layouts.main')
@section('products')
  <html>
    <head>
      <meta charset="utf-8">
      <title>Add Product</title>
    </head>
    <body>
      <h1>Products</h1>
      @foreach($prodDetails as $bufashproduct)
          <div class="col-md-3">
            <div class="">
              <div class="small-box bg-aqua">
                <img src="{{$bufashproduct->prod_image}}" />
                <img class='img-thumbnail'>
                <div class="container">
                  <h3>{{$bufashproduct->prod_name}}</h3>
                      <h2>{{$bufashproduct->prod_type}}</h2> | <h2>{{$bufashproduct->prod_qty}}</h2>
                  <p class="container">{{$bufashproduct->prod_desc}}</p>
                </div>
                <div class="container">

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
