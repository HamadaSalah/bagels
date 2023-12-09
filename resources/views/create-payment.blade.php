<!-- create-payment.blade.php -->
@extends('layouts.app')

@section('content')
    <form action="{{ url('/process-payment') }}" method="post">
        @csrf
        <script
            src="https://js.squareupsandbox.com/v2/paymentform"
            data-application-id="sandbox-sq0idb-cSONHMAzn3W4P44ptyzG3w"
            data-form-id="payment-form"
        ></script>
        <button id="process-payment-btn">Process Payment</button>
    </form>
@endsection
