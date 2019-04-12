@extends('layouts.app')
@section('content')
@include('layouts.products-shop-hero')
<section class="cart-list">
    <div class="cart-row cart-labels">
      <div class="row">
          <div class="columns is-9-desktop is-12-mobile is-centered is-mobile is-size-4 is-size-6-mobile">

            <div class="column is-2">
            </div>

            <div class="column is-3 has-text-weight-bold">
              <p>Name</p>
            </div>

            <div class="column is-2 has-text-weight-bold">
              <p>Unit price</p>
            </div>

            <div class="column is-2 has-text-weight-bold">
              <p>Quantity</p>
            </div>

            <div class="column is-2 has-text-weight-bold">
              <p>Price</p>
            </div>

          </div>
      </div>
    </div>
  @foreach (Cart::content() as $row)
    <div class="cart-row">

      <div class="row">
          <div class="columns is-9-desktop is-12-mobile is-centered is-mobile is-size-4 is-size-6-mobile">
              <div class="column is-2">
                <img src="/images/product_images/{{$row->options->image}}" alt="Product image">
              </div>

              <div class="column is-3">
                <p>{{$row->name}}</p>
              </div>
              <div class="column is-2">
                <p>{{$row->price}}&#163;</p>
              </div>
              <div class="column is-2">
                <p>{{$row->qty}}</p>
                <!--<a class="button is-danger" href="#">Update</a> -->
              </div>

              <div class="column is-2">
                <p>{{$row->subtotal}}&#163;</p>
                <a class="" href="{{url('cart/remove')}}/{{$row->rowId}}">Remove</a>
              </div>

          </div>
      </div>
    </div>
  @endforeach
</section>

<section >
  <div id="cart-total" class="columns is-9-tablet is-12-mobile is-centered is-mobile is-size-4">
      <div class="column is-4-desktop is-12-mobile is-centered has-text-centered-mobile">
        <div class="row">
          <p>Cart Subtotal:  {{ Cart::subtotal()}}&#163;</p>
        </div>
        <div class="row cart-tax">
          <p>Tax:  {{ Cart::tax()}}</p>
        </div>
        <div class="row has-text-weight-bold">
          <p>Cart Total {{ Cart::total()}}</p>
        </div>
        <a href="{{route ('cart')}}" id="checkout-button" onclick="alert('Website is currently in development and no orders are being taken.');" class="button is-white is-size-4">Checkout</a>
      </div>
  </div>
</section>
@endsection
