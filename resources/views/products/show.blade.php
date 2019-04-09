@extends('layouts.app')

@section('content')

@include('layouts.products-shop-hero')

    <section class="section has-text-centered">
      <div class="columns is-centered is-mobile">
        <div class="column is-3-desktop is-6-tablet">
                <img src="/images/product_images/{{$product->image}}" alt="Product image">
        </div>
        <div class="column is-3-desktop is-6-tablet">
          <p class="product-description-show">{{ $product->description }}</p>
          <p class="product-material-show"><b>Material:</b> {{ $product->material }}</p>
          <p class="product-price-show is-size-5">{{ $product->price }} &#163;</p>
        </div>
      </div>
@endsection
