@extends('layouts.app')
@section('content')

 <div class="container mt-5">
    <div class="row">
        <h1 class="text-center mb-5">Orders</h1>
        <table class="table mb-5">
            <thead> 
                
            </thead>
            <tbody style="border: 1px solid #ddd;" >
                <tr>
                    <td  style="text-align: center;font-weight: bold">Order Details</td>
                    <td  style="text-align: center;font-weight: bold">Date</td>
                </tr>

                @foreach ($orders as $order)
                <tr>
                    <td style="text-align: center">{!!$order->details!!}</td>
                    <td style="text-align: center">{{$order->created_at}}</td>
                  </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
 </div>

 
@endsection