<section id="hero-shop" class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">
        @if (Route::current()->getName() == "shop")
          Shop
        @elseif (Route::current()->getName() == "products.index")
          Product Management
        @elseif (Route::current()->getName() == "products.create")
          Create new Product
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
