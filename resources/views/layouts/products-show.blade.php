<section class="section has-text-centered">
  <div class="columns is-centered is-mobile is-centered has-text-centered">
    <div class="column is-3-desktop is-6-tablet">
            <img src="/images/product_images/{{$product->image}}" alt="Product image">
    </div>
    <div class="column is-3-desktop is-6-tablet has-text-centered is-centered product-details">
      <div class="">
        <p class="product-description-show">{{ $product->description }}</p>
        <p class="product-material-show"><b>Material:</b> {{ $product->material }}</p>
        <p class="product-price-show is-size-5"><strike class="is-primary"><?php $oldprice = $product->price * 1.35; echo (round($oldprice, 2)) ?> &#163;</strike> {{ $product->price  }} &#163;</p>
      </div>
    </div>
  </div>
<section>
