
@extends('Admin.master')
@section('content')
<h2 class="collectioName">Edit Settings</h2>
</a>
<div class="clearfix"></div>
<div class="table-responsive">
    <form method="POST" action="{{route('settings.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleSelect">Example select</label>
            <select class="form-control" id="exampleSelect" name="pro_status">
              <option value="0">Hide</option>
              <option value="1">Show</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Currency</label>
            <input type="text" class="form-control" name="currency" value="{{$settings->currency}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
</div>


@endsection

@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush



