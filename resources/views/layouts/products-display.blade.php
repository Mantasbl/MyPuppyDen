<section class="section">
  <div class="columns is-marginless is-centered">
    <div class="columns column is-8-fullhd is-11-widescreen is-11-desktop is-11-tablet is-centered is-marginless is-multiline is-mobile">
      @foreach ($products as $product)
      <div class="box column is-2-fullhd is-3-widescreen is-3-desktop is-4-tablet is-5-mobile product-column">
        <a href="{{ route('products.show',$product->id) }}">
          <img src="/images/product_images/{{$product->image}}" alt="Product image">
          <h1 class="product-name"><b>{{ $product->name }}</b></h1>
          <p class="product-description-index">{{ $product->description }}</p>
          <p class="product-material-index"><b>Material:</b> {{ $product->material }}</p>
          <p class="product-price-index is-size-5"><strike class="is-primary"><?php $oldprice = $product->price * 1.35; echo (round($oldprice, 2)) ?> &#163;</strike> {{ $product->price  }} &#163;</p>
        </a>
          <!-- First we check if route is products.index as trying to use Auth middleware will cause an error on other pages where Auth is not used-->
          @if (Route::current()->getName() == "products.index")
          @if (Auth::user()->isAdmin !=0)
          <form action="{{ route('products.destroy',$product->id) }}" method="POST">
              <a class="button is-info" href="{{ route('products.edit',$product->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="button is-danger">Delete</button>
          </form>
          @endif
          @endif
        </div>

        @endforeach
      </div>
  </div>
</section>
