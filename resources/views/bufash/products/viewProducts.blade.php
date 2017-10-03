
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
                <img src="" alt="{{$bufashproduct->prod_image}}">
                <img class='img-thumbnail'>
                <div class="container">
                  <h3>{{$bufashproduct->prod_name}}</h3>
                      <h2>{{$bufashproduct->prod_type}}</h2> | <h2>{{$bufashproduct->prod_qty}}</h2>
                  <textarea name="description" class="col-md-3">{{$bufashproduct->prod_desc}}</textarea>
                </div>
                <div class="container-fluid">
                  @if ($bufashproduct->id)
                    <form action="{{ url("/Products/$bufashproduct->id") }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="/Products">
                            <input type="submit" name="deleteProduct" value="delete">
                        </a>
                    </form> |
                  @endif
                    <form class="" action="/Products/{{ $bufashproduct->id }}/edit" method="GET">
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
