@extends('layouts.app')
@section('content')
<div class="pageheaders">
    <h1>MENU</h1>
</div>
<div class="row" style="margin-top: 80px;">
  @foreach ($products as $newpro)
  <div class="col-lg-4 col-md-6">
    <div class="catbox">
      <div class="imagepreview">
        <a href="{{Route('product', $newpro->id)}}"><img src="{{asset('images/'.$newpro->img)}}" alt=""></a>
      </div>
      <div class="catdet">
        <a href="{{Route('product', $newpro->id)}}"><h1>{{$newpro->name}}</h1></a>
          <a href="{{Route('product', $newpro->id)}}"><p>{{substr($newpro->desc, 0, 70)}} </p></a>
            <a href="{{Route('product', $newpro->id)}}"><h2>{{$newpro->price}}$</h2></a>
      </div>
    </div>
  </div>            
@endforeach
</div>

@endsection
