@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add New User </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.admins.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name"  placeholder="Write Name.." required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"  placeholder="Write Username.." required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password"  placeholder="Write Password.." required>
    </div>
    <div class="form-group">
        <label for="role">Select Role Name</label>
        <select class="form-control" id="role" required name="rolename">
            @foreach ($roles as $role)
            <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
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
