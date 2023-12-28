@extends('layouts.app')
@section('content')
<div class="pageheaders">
    <h1>Categories</h1>
</div>
<div class="catproductss">
    <div class="container">
        <div class="row">
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($cats as $cat)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($loop->index == 0) echo "active";  ?>"
                            id="{{$cat->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$cat->name}}"
                            type="button" role="tab" aria-controls="{{$cat->name}}"
                            aria-selected="true">{{$cat->name}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
              @foreach ($cats as $catt)
                <div class="tab-pane fade show <?php if($loop->index == 0) echo "active";  ?>" id="{{$catt->name}}" role="tabpanel" aria-labelledby="{{$catt->name}}-tab">
                    <div class="row bestsellerss">
                      @foreach ($catt->products as $mycat)      
                        <div class="col-lg-4 col-md-6">
                            <div class="catbox">
                                <div class="imagepreview">
                                    <a href="{{Route('product', $mycat->id)}}"><img src="{{asset('images/'.$mycat->img)}}" alt=""></a>
                                </div>
                                <div class="catdet">
                                    <a href="{{Route('product', $mycat->id)}}"><h1>{{$mycat->name}}</h1></a>
                                        <a href="{{Route('product', $mycat->id)}}"><p>{{$mycat->desc}} </p></a>
                                            <a href="{{Route('product', $mycat->id)}}"><h2>{{$mycat->price}}$</h2></a>
                                            @if ($mycat->count > 0)
                                            <form action="{{route('AddToCart', $mycat->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary addtocart">
                                                   <i class="fa-solid fa-circle-plus plusicon"></i> 
                                                </button>
                                                </form>

                                             @else
                                            <button class="btn btn-primary addtocart">
                                                <span class="plusicon" style="font-size: 14px;font-weight: bold;color: rgb(152, 0, 0)">Out Of Stock</span>
                                            </button>
                                            @endif
                                                            </div>
                            </div>
                        </div>                          
                      @endforeach
                        
                      </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
