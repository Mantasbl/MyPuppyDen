@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<section class="section">
  <div class="container is-fullhd">
  <div class="notification">
    This container is <strong>fullwidth</strong> <em>until</em> the <code>$fullhd</code> breakpoint.
  </div>
  </div>
  <div class="columns is-marginless is-centered">
    <div class="columns column is-9-desktop is-11-tablet is-centered is-marginless is-multiline is-mobile">
      @foreach ($products as $product)
        <div class="box column is-5-mobile is-2-desktop is-4-tablet product-column">
          <a href="{{ route('products.show',$product->id) }}">
            <img src="/images/product_images/{{$product->image}}" alt="Product image">
            <h1 class="product-name"><b>{{ $product->name }}</b></h1>
            <p class="product-description">{{ $product->description }}</p>
            <p class="product-price">{{ $product->price }} &#163;</p>
          </a>

        </div>

        @endforeach
      </div>
  </div>
</section>




    {!! $products->links() !!}

@endsection
