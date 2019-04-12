<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MyPuppyDen - {{ ucfirst(Route::current()->getName()) }}</title>

        <!-- Styles -->
        <link rel="icon" href="/images/public_site_images/mypuppyden_logo.png">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        @yield('head')
    </head>
    <body>
        <div id="app">
          <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
              <a class="navbar-item nav-brand-logo" href="{{ url('/') }}">
                <img src="/images/public_site_images/mypuppyden_logo.png">
              </a>

              <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
              <div class="navbar-start">
                <a href="{{ route('home')}}" class="navbar-item">
                  Home
                </a>
                <!-- If this is accessed by admin, will be directed to view with products CRUD -->
                <a href="@if (Auth::guest() || Auth::user()->isAdmin !=1)
                          {{route('shop')}}
                         @else
                           {{route('products.index')}}
                         @endif" class="navbar-item">
                        @if (Auth::guest() || Auth::user()->isAdmin !=1)
                           Shop
                        @else
                           Products
                        @endif
                </a>

                <a href="{{ route('cart')}}" class="navbar-item">
                  Cart
                </a>
                <!--
                <div class="navbar-item has-dropdown is-hoverable">
                  <a class="navbar-link">
                    FAQ
                  </a>

                  <div class="navbar-dropdown">
                    <a class="navbar-item">
                      About
                    </a>
                    <a class="navbar-item">
                      Jobs
                    </a>
                    <a class="navbar-item">
                      Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                      Report an issue
                    </a>
                  </div>
                </div>
              -->
              </div>

              <div class="navbar-end">
                <div class="navbar-item">
                  <a href="{{ route('cart')}}"><i class=" cart fas fa-shopping-cart"></i></a>
                </div>
                <div class="navbar-item logged-in-nav">
                  <div class="buttons">
                    @if (Auth::guest())
                        <a class="button is-info " href="{{ route('login') }}">Login</a>
                        <a class="button is-light " href="{{ route('register') }}">Register</a>
                    @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('profile') }}">
                                Profile
                            </a>
                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </nav>
            @yield('content')
            <footer class="footer">
              <div class="content has-text-centered">

              </div>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
