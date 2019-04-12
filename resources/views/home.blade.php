@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar hero-home">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title hero-title has-text-centered">
            We Can't get Enough of Dogs!
          </h1>
          <h2 class="subtitle hero-subtitle">
            We pride ourselves for our expertise in taking care of pups and dogs.
            Browse our collection of carefully curated products that your dog will love
          </h2>
          <a href="{{route('shop')}}" class="button is-info">Browse our collection</a>
        </div>
      </div>
    </section>
    <!-- Featured item section -->
    <section class="section has-text-centered">
      <div class="container">
        <h1 class="title">Featured Product</h1>
      </div>
    </section>
    @foreach ($featuredproduct as $product)
    @include('layouts.products-show')
    @endforeach

    <!-- Newest Additions section -->
    <section class="section has-text-centered">
      <div class="container">
        <h1 class="title">Newest Additions</h1>
      </div>
    </section>
    @include('layouts.products-display')

@endsection
