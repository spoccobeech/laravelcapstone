<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!--a class="navbar-brand" href="#">Navbar</a-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" >
        <ul class="nav nav-pills justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('ItemsToShop')}}">Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/aboutUs')}}">About</a>
          </li>
          @if(Auth::guest())
          <li class="nav-item">
            <a href="{{ url('/login') }}" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/register') }}" class="nav-link">Register</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('/itemCart')}}">Shopping Cart ( {{ Cart::count() }} )</a>
          </li>
          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu">
              <a href="#" class="nav-link">Wishlist</a>
              <a href="#" class="nav-link">Profile</a>
              <a href="{{ url('/logout') }}" class="dropdown-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                       <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
            </div>
          </li>
          @endif
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      @yield('home')
      @yield('products')
      @yield('abouts')
      @yield('content')
      @yield('itemPurchase')
      @yield('cart')
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <div class="footer" style="margin-top:125px;">
      <center>
        <h6>(c) 2017 All Rights Reserved</h6>
        <br/>  <a href="#">Home</a>
        | <a href="#">Products</a>
        | <a href="#">Abouts</a>
        | <a href="#">Seller Centre</a>
      </center>
    </div>
  </body>
</html>
