@extends('layouts.app')
@section('content')



<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  @if (productStatus())<th class="product-price">Price</th>@endif
                  <th class="product-quantity">Quantity</th>
                  @if (productStatus())<th class="product-total">Total</th>@endif
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                  <?php $total = 0;$order=''; ?>
                  @foreach ($carts as $cart)
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/{{$cart->product->img}}" alt="Image" class="img-fluid" style="max-width: 100%;height: 70px; 
                      text-align: center;
                      margin: auto;
                      display: block;">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{$cart->product->name}}</h2>
                    </td>
                    @if (productStatus())
                      @if ($cart->product->discount)
                      <td>{{(float)$cart->product->price -(float)$cart->product->discount }}</td>
                      @else
                      <td>{{(float)$cart->product->price }}</td>
                      @endif
                      @endif
                      <td>
                    </form>
                        <form action="{{route('cartMin', $cart->product->id)}}" method="POST" style="display: inline;float: left;">
                            @csrf
                            <button class="btn btn-outline-primary" type="submit">&minus;</button>
                        </form>
                        <input type="text" class="form-control text-center" value="{{$cart->count}}" placeholder=""
                        aria-label="Example text with button addon" aria-describedby="button-addon1" style="display: inline;width: 50px;float: left;height: 37px;border-radius: 0;">
                        <form action="{{route('cartPlus', $cart->product->id)}}" method="POST" style="display: inline;float: left;">
                            @csrf
                            <button class="btn btn-outline-primary" type="submit">&plus;</button>
                        </form>


                    </td>@if (productStatus())
                   <?php 
                   $total += ((float)$cart->product->price -(float)$cart->product->discount) * (float)$cart->count; 
                   $order .= $cart->product->name ." &#8594; Count (".$cart->count.") <br/>";
                   ?>
                    <td>{{((float)$cart->product->price -(float)$cart->product->discount) * (float)$cart->count }}</td>
                    @endif
                    <td>
                        <form action="{{route('deleteCart', $cart->id)}}" method="POST">
                            @csrf
                            <button class="btn" type="submit" style="box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.22) !important;">X</button>
                        </form>
                    </td>
                  </tr>  
                  @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>
  
      <div class="row">
        <div class="col-md-12">
          <div class="row justify-content-end">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 text-center border-bottom mb-5">
                  {{-- <h3 class="text-black h4 text-uppercase">Cart Totals = <strong class="text-black">{{$total}} (SOS)</strong> </h3> --}}
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg btn-block mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal" >Proceed To
                    Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" style="z-index: 9999999999999!important" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkout Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{Route('checkout')}}">
          <input type="hidden" value="{{$order}}" name="details">
            @csrf            
            <div class="form-group">
              <input type="address" placeholder="Write Your address ..." name="address" class="form-control mb-3" required>
          </div>
          <div class="form-group">
              <input type="street" placeholder="Write Your street ..." name="street" class="form-control mb-3" required>
          </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
     </div>
  </div>
</div>

   
@endsection