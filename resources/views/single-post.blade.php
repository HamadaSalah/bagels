@extends('layouts.app')
@section('content')
<div class="pageheaders">
    <h1>{{$product->name}}</h1>
  </div>
  <div class="product_details">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center" style="border-radius: 15px;">
            <a style="width: 100%" data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{asset('images/'.$product->img)}}">
              <img style="width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('images/'.$product->img)}}">
            </a>
          </div>
        
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              {{$product->name}}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star"></i>
                <span class="ms-1">
                  5.00
                </span>
              </div>
            </div>
  
            <div class="mb-3">
              <span class="h5">${{$product->price}}</span>
            </div>
  
            <p>
                {{$product->desc}}
             </p>
  
            
  
            <hr>

            @if ($product->count > 0)
            <form action="{{route('AddToCart', $product->id)}}" method="POST">
              @csrf
              <button class="btn btn-primary addtocart"><i class="me-1 fa fa-shopping-basket"></i> Add To Cart</button>
              </form>
            @else
            <button class="btn btn-danger addtocart">
              Out Of Stock
            </button>
            @endif

            

           </div>
        </main>
      </div>
    </div>
  </div>

@endsection