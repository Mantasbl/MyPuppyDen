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

@include('layouts.products-display')

  @if (Auth::user()->isAdmin !=0)
      <a class="button product-create is-warning" href="{{ route('products.create') }}"> Create New Product</a>
  @endif




  {!! $products->links() !!}

@endsection
