@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">All Categories</h2>
<a href="{{ route('category.create') }}">
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>New Category</button>
</a>
<div class="clearfix"></div>
@if($categories->count() <= 0)
    <div class="text-center">No Data Available</div>
@else
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">name</th>
                    <th class="border-top-0">IMG</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a data-fancybox="gallery"
                                href="{{ asset('images/'.$category->img) }}">
                                <img src="{{ asset('images/'.$category->img) }}"
                                    style="width: 100px;height: 100px;" class="img-thumbnail" alt="">
                            </a>
                        </td>
                        <td>
                            <form style="display: inline;"
                                action="{{ route('category.destroy', $category->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            <a href="{{Route('category.edit', $category->id)}} ">
                                <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                            </a>
    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
