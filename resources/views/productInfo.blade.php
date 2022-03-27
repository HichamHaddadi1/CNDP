@extends('layouts.app')

@section('content')
 
    <div class="container">
        <div class="card border-info text-center">
          <img class="card-img-top img-fluid" src="/{{ $product->images->first()->path }}" alt="product_image">
          <div class="card-body">
            <h4 class="card-title">{{ $product->title }}</h4>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">{{ $product->categories->title }}</p>
          </div>
        </div>
    </div>
@endsection