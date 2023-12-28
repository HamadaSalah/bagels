@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Products</h2>
<a href="{{route('product.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i> New Product</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($products->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Category</th>
                    <th class="border-top-0">Price</th>
                    <th class="border-top-0">count</th>
                    <th class="border-top-0">img</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category?->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->count}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('images/'.$product->img)}}"> <img src="{{asset('images/'.$product->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('product.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        <a href="{{Route('product.edit', $product->id)}} ">
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
