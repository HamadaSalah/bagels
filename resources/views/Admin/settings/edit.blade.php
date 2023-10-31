
@extends('Admin.master')
@section('content')
<form method="POST" action="{{route('admin.settings.update', $settings->id)}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
	<div class="form-group">
		<label for="name">Website Name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" value=" {{$settings->name}}" >
	</div>
    <div class="form-group">
		<label for="boximg">Box Img</label>
		<input type="file" name="BoxImg" class="form-control" id="boximg" >
	</div>
    <div class="form-group">
		<label for="logo">Logo</label>
		<input type="file" name="logo" class="form-control" id="logo" >
	</div>
    <div class="form-group">
		<label for="img">Slid 1 Img</label>
		<input type="file" name="slid1_img" class="form-control" id="img" >
	</div>
	<div class="form-group">
		<label for="name">Slid 1 Intro (EN)</label>
		<input type="text" class="form-control" name="slid1_intro_en" id="name" placeholder="Enter Product Name" value=" {{$settings->slid1_intro_en}}" >
	</div>
	<div class="form-group">
		<label for="name">Slid 1 Intro (AR)</label>
		<input type="text" class="form-control" name="slid1_intro_ar" id="name" placeholder="Enter Product Name" value=" {{$settings->slid1_intro_ar}}" >
	</div>
    <div class="form-group">
		<label for="img">Slid 2 Img</label>
		<input type="file" name="slid2_img" class="form-control" id="img" >
	</div>
	<div class="form-group">
		<label for="name">Slid 2 Intro (EN)</label>
		<input type="text" class="form-control" name="slid2_intro_en" id="name" placeholder="Enter Product Name" value=" {{$settings->slid2_intro_en}}" >
	</div>
	<div class="form-group">
		<label for="name">Slid 2 Intro (AR)</label>
		<input type="text" class="form-control" name="slid2_intro_ar" id="name" placeholder="Enter Product Name" value=" {{$settings->slid2_intro_ar}}" >
	</div>
    <div class="form-group">
		<label for="img">Slid 3 Img</label>
		<input type="file" name="slid3_img" class="form-control" id="img" >
	</div>
	<div class="form-group">
		<label for="name">Slid 3 Intro (EN)</label>
		<input type="text" class="form-control" name="slid3_intro_en" id="name" placeholder="Enter Product Name" value=" {{$settings->slid3_intro_en}}" >
	</div>
	<div class="form-group">
		<label for="name">Slid 3 Intro (AR)</label>
		<input type="text" class="form-control" name="slid1_intro_ar" id="name" placeholder="Enter Product Name" value=" {{$settings->slid1_intro_ar}}" >
	</div>
	<div class="form-group">
		<label for="name">Box Intro (EN)</label>
		<input type="text" class="form-control" name="box_intro_en" id="name" placeholder="Enter Product Name" value=" {{$settings->box_intro_en}}" >
	</div>
	<div class="form-group">
		<label for="name">Box Intro (AR)</label>
		<input type="text" class="form-control" name="box_intro_ar" id="name" placeholder="Enter Product Name" value=" {{$settings->box_intro_ar}}" >
	</div>
	<div class="form-group">
		<label for="name">Copy Rights (EN)</label>
		<input type="text" class="form-control" name="CopyRights_en" id="name" placeholder="Enter Product Name" value=" {{$settings->CopyRights_en}}" >
	</div>
	<div class="form-group">
		<label for="name">Copy Rights (AR)</label>
		<input type="text" class="form-control" name="CopyRights_ar" id="name" placeholder="Enter Product Name" value=" {{$settings->CopyRights_ar}}" >
	</div>
    <div class="form-group">
    <span class="MyToggleBtn">
        <label for="name">Status Of Website</label> <br/>
        <input type="checkbox" data-toggle="toggle" name="WebsiteStatus" data-style="ios" data-onstyle="outline-success" data-offstyle="outline-danger"
        <?php if ($settings->WebsiteStatus == 0) {
            echo "checked";
        } ?>>
    </span>
    </div>
    <div class="form-group">
    <button class="btn btn-primary">Update Data</button>
    </div>
@endsection
@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
