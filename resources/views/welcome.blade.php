@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-primary text-center text-uppercase">Here will be the list of all the products
            
        </div>
            <div class="row mt-3">
            @forelse ($products as $product)
            <div class="col-3 mb-3">
                   <a href="{{ route('checkProduct' , $product->id) }}">
                <div class="card text-center">
                    <img class="card-img-top" src="{{ $product->images->first()->path }}" alt="product-image">
                    <div class="card-body">
                      <h4 class="card-title">{{ $product->title }}</h4>
                      <p class="card-text">{{ $product->description }}</p>
                      <p class="card-text">{{ $product->categories->title }}</p>

                    </div>
                  </div>
                </a>
               </div>
               @empty
               <div class="conatiner text-center mt-5 border p-5">There is no products for the moment</div>
            @endforelse
            </div>


            
    </div>
@endsection