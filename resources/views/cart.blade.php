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
                <form id="payment-form" >@csrf
                  <input type="hidden" class="form-control" name="amount" id="price-input"
                      style="width: 100%; height: 40px; border: 2px solid #ccc; border-radius: 4px; padding: 8px;"
                      value="{{ session('price', '') }}">
                  <div id="card-container"></div>
                  <div id="errorBody" style="color: red;margin: 3px"></div>
                  <button class="cardBtn btn btn-success" id="card-button" type="button">Pay Now</button>
              </form>
              <div id="payment-status-container"></div> 
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script src="https://web.squarecdn.com/v1/square.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/card-validator/dist/card-validator.min.js"></script>
              
              <script>
                  const appId = 'sq0idp--mmVbmLxuiLZFcTwb-F2YA';
                  const locationId = 'LYQ78M8HRC23X';
              
                  async function initializeCard(payments) {
                      const card = await payments.card();
                      await card.attach('#card-container');
              
                      return card;
                  }
              
                  async function createPayment(token, amount) {
                      const body = JSON.stringify({
                          locationId,
                          sourceId: token,
                          amount: 50,
                      });
              
                      const paymentResponse = await fetch('/api/payment', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/json',
                          },
                          body,
                      });
              
                      if (paymentResponse.ok) {
                        console.log(paymentResponse.ok);
                        document.getElementById("MYFFORMM").submit();
                          
                      }
                      else {
                        const errorBody = await paymentResponse.text();

                        document.getElementById("errorBody").innerHTML = "Failed When Transaction or invalid data!";

                      }
              

                  }
              
                  async function tokenize(paymentMethod) {
                      const tokenResult = await paymentMethod.tokenize();
                      if (tokenResult.status === 'OK') {
                          return tokenResult.token;
                      } else {
                          console.log(tokenResult.errors);
                          // throw new Error(errorMessage);
                      }
                  }
              
                  function displayPaymentResults(status) {
                      const statusContainer = document.getElementById('payment-status-container');
                      if (status === 'SUCCESS') {
                          statusContainer.classList.remove('is-failure');
                          statusContainer.classList.add('is-success');
                      } else {
                          statusContainer.classList.remove('is-success');
                          statusContainer.classList.add('is-failure');
                      }
              
                      statusContainer.style.visibility = 'visible';
                  }
              
                  document.addEventListener('DOMContentLoaded', async function () {
                      if (!window.Square) {
                          throw new Error('Square.js failed to load properly');
                      }
              
                      let payments;
                      try {
                          payments = window.Square.payments(appId, locationId);
                      } catch {
                          const statusContainer = document.getElementById('payment-status-container');
                          statusContainer.className = 'missing-credentials';
                          statusContainer.style.visibility = 'visible';
                          return;
                      }
              
                      let card;
                      try {
                          card = await initializeCard(payments);
                      } catch (e) {
                          console.error('Initializing Card failed', e);
                          return;
                      }
              
                      async function handlePaymentMethodSubmission(event, paymentMethod) {
                          event.preventDefault();
              
                          try {
                              const cardNonce = await paymentMethod.tokenize();
                              if (cardNonce) {
                                  cardButton.disabled = true;
              
                                  const amountValue = 50;
                                  if (isNaN(amountValue) || amountValue <= 0) {
                                      throw new Error('Invalid or missing amount.');
                                  }
              
                                  const paymentResults = await createPayment(cardNonce, amountValue);
              
                                  displayPaymentResults('SUCCESS');
                                  console.debug('Payment Success', paymentResults);
                              } else {
                                  displayPaymentResults('FAILURE');
                                  console.error('Invalid card nonce');
                              }
                          } catch (e) {
                              cardButton.disabled = false;
                              displayPaymentResults('FAILURE');
                              console.error(e.message);
                          }
                      }
              
                      const cardButton = document.getElementById('card-button');
                      cardButton.addEventListener('click', async function (event) {
                          await handlePaymentMethodSubmission(event, card);
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