@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include('layouts.products-shop-hero')

<div class="columns is-centered">
  <div class="column is-5 is-centered">
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Product Name" name="name" value="{{ $product->name }}">
      </div>
    </div>

    <div class="field">
      <label class="label">Description</label>
      <div class="control">
        <textarea class="textarea" placeholder="Product Description" name="description" value="{{ $product->description}}">{{ $product->description}}</textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Material</label>
      <div class="control">
        <textarea class="textarea" placeholder="Product Material" name="material" value="{{ $product->material}}">{{ $product->material}}</textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Price</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input" type="number" name="price" placeholder="0.00" step="0.01" min="0" value="{{ $product->price}}">
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-check"></i>
        </span>
      </div>
    </div>
<!--
    <div class="file has-name field is-horizontal">
      <div class="field">
        <label class="label">Image</label>
        <label class="file-label">
          <input class="file-input" type="file" name="image" value="{{$product->image}}">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
        </label>
      </div>
    </div>
-->
    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link">Submit</button>
      </div>
      <div class="control">
        <a class="button is-danger" href="{{ route('products.index') }}"> Back</a>
      </div>
    </div>
    </form>
  </div>
</div>


@endsection
