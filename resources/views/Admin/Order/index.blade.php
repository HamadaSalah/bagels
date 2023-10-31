@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Orders</h2>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($orders->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Phone</th>
                    <th class="border-top-0">Details</th>
                    <th class="border-top-0">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->address}}<br/>{{$order->street}}</td>
                    <td>{!!$order->details!!}</td>
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    @else
        <div class="text-center">No Data Available</div> 
    @endif
@endsection
