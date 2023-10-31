@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit About Us Details </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('about.update', $about->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">DESC</label>
        <input type="name" class="form-control" id="name" name="desc"  placeholder="Write DESC.." required value="{{$about->desc}}">
    </div>
    <div class="form-group">
        <label for="name">Hero Img</label>
        <input type="file" class="form-control" id="name" name="img"    value="{{$about->img}}">
    </div>
    <div class="form-group">
        <label for="name">Address</label>
        <input type="name" class="form-control" id="name" name="address"  placeholder="Write Address.." required value="{{$about->address}}">
    </div>
    <div class="form-group">
        <label for="name">Vision</label>
        <input type="name" class="form-control" id="name" name="vision"  placeholder="Write Vision.." required value="{{$about->vision}}">
    </div>
    <div class="form-group">
        <label for="name">Mission</label>
        <input type="name" class="form-control" id="name" name="mission"  placeholder="Write Mission.." required value="{{$about->mission}}">
    </div>
    <div class="form-group">
        <label for="name">Value</label>
        <input type="name" class="form-control" id="name" name="value"  placeholder="Write value.." required value="{{$about->value}}">
    </div>
    <div class="form-group">
        <label for="name">Phone</label>
        <input type="name" class="form-control" id="name" name="phone"  placeholder="Write value.." required value="{{$about->phone}}">
    </div>
    <div class="form-group">
        <label for="name">Email</label>
        <input type="name" class="form-control" id="name" name="email"  placeholder="Write value.." required value="{{$about->email}}">
    </div>
    <div class="form-group">
        <label for="name">Pharma Products</label>
        <input type="name" class="form-control" id="name" name="pharma_products"  placeholder="Write value.." required value="{{$about->pharma_products}}">
    </div>
    <div class="form-group">
        <label for="name">Rated By Experts</label>
        <input type="name" class="form-control" id="name" name="rated_by"  placeholder="Write value.." required value="{{$about->rated_by}}">
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
