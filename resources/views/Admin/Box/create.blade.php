@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add New Project </h2>

<div class="clearfix"></div>

<form method="POST" action="{{ route('admin.fund.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nn">Name(AR)</label>
        <input type="text" class="form-control" id="nn" name="name_ar" placeholder="Write name.." required>
    </div>

    <div class="form-group">
        <label for="img">Desc(AR)</label>
        <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
    </div>
    <div class="form-group">
        <label for="nn">Name(en)</label>
        <input type="text" class="form-control" id="nn" name="name_en" placeholder="Write name.." required>
    </div>

    <div class="form-group">
        <label for="img">Desc(en)</label>
        <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
    </div>
    <div class="form-group">
        <label for="nn">Name(so)</label>
        <input type="text" class="form-control" id="nn" name="name_so" placeholder="Write name.." required>
    </div>

    <div class="form-group">
        <label for="img">Desc(so)</label>
        <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@push("custom-css")

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
