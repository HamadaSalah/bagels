@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Box Funds</h2>
<a href="{{route('admin.fund.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New Box</button>
</a>
<div class="clear"></div>

    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">name</th>
                    <th class="border-top-0">desc</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->name_ar}}</td>
                    <td>{{$slider->desc_ar}}</td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.gallery.destroy', $slider->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                         <a href="{{route('admin.fund.show', $slider->id)}}">
                        <button class="btn btn-primary"><i class="fa fa-eye"></i> Show </button></a>
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection
