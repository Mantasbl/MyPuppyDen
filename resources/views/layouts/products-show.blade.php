<section class="section">
  <div class="columns is-centered is-mobile">
    <div class="column is-3-desktop is-6-tablet has-text-centered">
            <img src="/images/product_images/{{$product->image}}" alt="Product image">
    </div>
    <div class="column columns is-3-desktop is-6-tablet product-details">
      <div class="">
        <h1 class="title">{{$product->name}}</h1>
        <p class="product-price-show is-size-5"><strike class="is-primary"><?php $oldprice = $product->price * 1.35; echo (round($oldprice, 2)) ?> &#163;</strike> {{ $product->price  }} &#163;</p>
        <p class="product-description-show">{{ $product->description }}</p>
        <p class="product-material-show is-size-6"><b>Material:</b> {{ $product->material }}</p>
        <div id="add-to-cart-show" class="column is-full">
          <a href="{{ url('/cart/add')}}/{{$product->id}}" class="button is-white"> ADD TO CART</a>
        </div>
        <div id="buy-it-now-show" class="column is-full">
          <a href="#" class="button is-info"> BUY IT NOW</a>
        </div>

      </div>
    </div>
  </div>
</section>
