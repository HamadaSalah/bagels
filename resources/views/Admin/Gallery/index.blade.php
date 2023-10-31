@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Gallerys</h2>
<a href="{{route('admin.gallery.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New Gall IMG</button>
</a>
<div class="clear"></div>

    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">type</th>
                    <th class="border-top-0">Img</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->category->name}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('assets/img/slide/'.$slider->img)}}"> <img src="{{asset('assets/img/slide/'.$slider->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.gallery.destroy', $slider->id)}}" method="post">
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
@endsection
