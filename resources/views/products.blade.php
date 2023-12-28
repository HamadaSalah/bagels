@extends('layouts.app')
@section('content')
<div class="pageheaders">
    <h1>MENU</h1>
    <div class="container">
      <div class="row">
        <div class="mb-3 mt-5" >
          <form action="{{Route('menuSearch')}}" method="GET">
          @csrf
          <input type="text" required name="search" value="{{request()->search}}" placeholder="Search Product..." class="form-control searcharea" id="exampleInputEmail1" aria-describedby="emailHelp">

        </form>
        </div>
   
      </div>
    </div>
  
</div>
<div class="container">
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
  
</div>

@endsection
