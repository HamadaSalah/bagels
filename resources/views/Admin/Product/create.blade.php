@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add New Product </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name"  placeholder="Write Product Name.." required>
    </div>
    <div class="form-group">
        <label for="name">Description</label>
        <input type="name" class="form-control" id="name" name="desc"  placeholder="Write Desc Name.." required>
    </div>
    <div class="form-group">
        <label for="name">Category</label>
        <select class="form-control" id="exampleSelect" name="category_id">
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
      
    </div>
    <div class="form-group">
        <label for="name">Type</label>
        <select class="form-control" id="exampleSelect" name="type">
            <option value="popular">Popular</option>
            <option value="new">New</option>
        </select>
      
    </div>

    <div class="form-group">
        <label for="name">Price</label>
        <input type="name" class="form-control" id="name" name="price"  placeholder="Price ...." required>
    </div>
    <div class="form-group">
        <label for="count">Count</label>
        <input type="number" class="form-control" id="count" name="count"  placeholder="Count ...." required>
    </div>
    {{-- <div class="form-group">
        <label for="name">Discount</label>
        <input type="name" class="form-control" id="name" name="discount"  placeholder="Discount ....">
    </div> --}}
    <div class="form-group">
        <label for="img">IMG</label>
        <input type="file" class="form-control" id="img" name="img"  placeholder="Write Body.." required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
