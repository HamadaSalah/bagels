@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All TestMonials</h2>
<a href="{{route('testmonials.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i> New TestMonials</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($tests->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Description</th>
                    <th class="border-top-0">img</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $test)
                <tr>
                    <td>{{$test->id}}</td>
                    <td>{{$test->name}}</td>
                    <td>{{$test->desc}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('images/'.$test->img)}}"> <img src="{{asset('images/'.$test->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('testmonials.destroy', $test->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        {{-- <a href="{{Route('test.edit', $test->id)}} ">
                            <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        </a> --}}
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    @else
        <div class="text-center">No Data Available</div> 
    @endif
@endsection
