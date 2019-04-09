@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@include('layouts.products-shop-hero')


@include('layouts.products-display')




    {!! $products->links() !!}

@endsection
