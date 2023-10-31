@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Sliders</h2>
<a href="{{route('slider.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New Slider</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($sliders->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Head</th>
                    <th class="border-top-0">Img</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->head}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('images/'.$slider->img)}}"> <img src="{{asset('images/'.$slider->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('slider.destroy', $slider->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        <a href="{{Route('slider.edit', $slider->id)}} ">
                            <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        </a>
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
