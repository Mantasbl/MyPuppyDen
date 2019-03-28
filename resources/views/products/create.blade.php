@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

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

<!--
<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
-->
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Product Name" name="name">
  </div>
  </div>

  <div class="field">
    <label class="label">Description</label>
    <div class="control">
      <textarea class="textarea" placeholder="Product Description" name="description"></textarea>
    </div>
  </div>

  <div class="field">
    <label class="label">Price</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input" type="number" name="price" placeholder="0.00" step="0.01" min="0">
      <span class="icon is-small is-left">
        <i class="fas fa-user"></i>
      </span>
      <span class="icon is-small is-right">
        <i class="fas fa-check"></i>
      </span>
    </div>
    <!--<p class="help is-success">This username is available</p>  -->
  </div>

  <div class="file has-name">
    <label class="file-label">
      <input class="file-input" type="file" name="image">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Choose a file…
        </span>
      </span>
      <span class="file-name">
        Screen Shot 2017-07-29 at 15.54.25.png
      </span>
    </label>
  </div>

  <div class="field is-grouped">
    <div class="control">
      <button class="button is-link">Submit</button>
    </div>
    <div class="control">
      <button class="button is-text">Cancel</button>
    </div>
  </div>

</form>
@endsection
