@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Messages</h2>
<div class="clearfix"></div>
@if ($messages->count() <= 0)
<div class="text-center">No Data Available</div>
@else
<div class="table-responsive">
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">name</th>
                <th class="border-top-0">phone</th>
                <th class="border-top-0">Message</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->f_name}} {{$message->l_name}}</td>
                <td>{{$message->phone}}</td>
                <td>{{$message->message}}</td>
                <td>
                    <form style="display: inline;" action="{{route('messagesDelete', $message->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endif
@endsection
