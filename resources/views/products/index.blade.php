@extends('layouts.app')

@section('content')

@include('layouts.products-shop-hero')

  @if ($message = Session::get('success'))
    <div class="columns is-centered">
      <div class="column is-8">
        <div class="notification is-success">
          <button class="delete"></button>
          {{ $message }}
        </div>
      </div>
    </div>
  @endif
  <section class="section">
    <div class="columns is-marginless is-centered">
      <div class="columns column is-8-desktop is-11-tablet is-centered is-marginless is-multiline is-mobile">
        @foreach ($products as $product)
          <div class="box column is-5-mobile is-3-desktop is-4-tablet product-column">
            <a href="{{ route('products.show',$product->id) }}">
              <img src="/images/product_images/{{$product->image}}" alt="Product image">
              <h1 class="product-name"><strong>{{ $product->name }}</strong></h1>
              <p class="product-description">{{ $product->description }}</p>
              <p class="product-price">{{ $product->price }} &#163;</p>
            </a>
            @if (Auth::user()->isAdmin !=0)
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="button is-info" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger">Delete</button>
            </form>
            @endif
          </div>

          @endforeach
        </div>
    </div>
  </section>

  @if (Auth::user()->isAdmin !=0)
      <a class="button product-create is-warning" href="{{ route('products.create') }}"> Create New Product</a>
  @endif




  {!! $products->links() !!}

@endsection
