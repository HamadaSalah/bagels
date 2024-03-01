@extends('layouts.app')
@section('content')



<div class="site-section">

    <div class="container">
      @if (count($carts) > 0)
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
                        <form action="{{route('cartMin', $cart->product->id)}}" method="POST" style="display: inline;float: left;" 
                          >
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
              @guest
              <button class="btn btn-suceess">
                <a class="nav-link active" aria-current="page" href="{{ Route('login') }}"><button class="btn btn-success loginbutton">Log in</button></a>
              </button>
                @else
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal" >Proceed To
                      Checkout</button>
                  </div>
                </div>
  
              @endguest
            </div>
          </div>
        </div>
      </div>  
      <div class="modal fade" style="z-index: 9999999999999!important" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Checkout Now</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{Route('checkout')}}" id="MYFFORMM">
                <input type="hidden" value="{{$order}}" name="details">
                  @csrf            
                  {{-- <div class="form-group">
                    <input type="address" placeholder="Write Your address ..." value="{{auth()?->user()?->address}}" name="address" class="form-control mb-3" required>
                </div>
                <div class="form-group">
                    <input type="street" placeholder="Write Your street ..." value="{{auth()?->user()?->street}}" name="street" class="form-control mb-3" required>
                </div> --}}
                <input type="hidden" class="form-control" name="amount" id="price-input"
                    style="width: 100%; height: 40px; border: 2px solid #ccc; border-radius: 4px; padding: 8px;"
                    value="{{ session('price', '') }}">
              </form>

              <div class="checkout-form">
                <div class="form-group">
                    <label for="cardNumber">Card Number</label><br/>
                    <input class="form-control" type="number" value="" id="cardNumber" minlength="0" maxlength="16" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div><br/>
                <div class="form-group">
                    <label for="expDate">Expiration Date</label><br/>
                    <input class="form-control" type="number" id="expDate"  minlength="0" maxlength="4" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div><br/>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input class="form-control" type="number" id="cvv"  minlength="0" maxlength="3" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                </div><br/>
                <div class=""><center style="color: red" id="infoo"></center></div>
                <button type="submit" class="btn btn-success" id="submitBtn22">Submit</button>
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              
              <script>
                $(document).ready(function() {
                  $('#submitBtn22').click(function(e) {
                      e.preventDefault();
                      
                      var cardNumber = $('#cardNumber').val();
                      var expDate = $('#expDate').val();
                      var cvv = $('#cvv').val();
                      var amount = $('#price-input').val();

                      let route = "{{ route('paymentCheckout') }}";
                      let token = "{{ csrf_token()}}";
                      $("#infoo").html("");

                      $.ajax({
                          url: route,
                          type: 'POST',
                          data: {
                              _token:token,
                              cardNumber:cardNumber,
                              expDate:expDate,
                              cvv:cvv,
                              amount:amount
                          },
                          success: function(response) {

                              if(response.success_url != false) {
                                $('#MYFFORMM').submit();
                              }
                              else {
                                $("#infoo").html(response.mesg);
                              }

                          },
                          error: function(xhr) {
                          }});

                  });
                });
              
              </script>
              
                  {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
              </form>
          </div>
           </div>
        </div>
      </div>
              
      @else 
      <center class="mt-5 mb-5"> No Items</center>
      @endif
      

    </div>
  </div>
  <!-- Modal -->

   
@endsection