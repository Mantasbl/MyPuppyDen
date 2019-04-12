<section id="hero-shop" class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <!--Has different routes and link text depending on whether its an admin or user/guest looking at it-->
      <h1 class="title has-text-centered">
        @if (Route::current()->getName() == "shop")
          Shop
        @elseif (Route::current()->getName() == "products.index")
          Product Management
        @elseif (Route::current()->getName() == "products.create")
          Create new Product
        @elseif (Route::current()->getName() == "products.edit")
          Edit Product
        @elseif (Route::current()->getName() == "login")
          Login
        @elseif (Route::current()->getName() == "register")
          Register
        @elseif (Route::current()->getName() == "profile")
          Welcome {{$user->name}}
        @elseif (Route::current()->getName() == "cart" || "cart/add")
          Shopping Cart

        @endif

      </h1>
      <h2 class="subtitle has-text-centered">
        @if (Route::current()->getName() == "shop")
          Browse our finest selection of highest quality goods
        @elseif (Route::current()->getName() == "products.index")
          Admin panel for product management
        @elseif (Route::current()->getName() == "products.create")
          Create new Product
        @endif
      </h2>
    </div>
  </div>
</section>
