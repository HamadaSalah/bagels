@extends('layouts.app')
@section('content')

 

  <div class="sliderr">
    <div class="container">
      <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @foreach ($sliders as $key => $slider) 
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="<?php if($loop->index == 0) echo 'active'; ?>"
              aria-current="true" aria-label="Slide {{$key+1}}"></button>

              @endforeach

             
          </div>
          <div class="carousel-inner">
            @foreach ($sliders as $slider)
              <div class="carousel-item <?php if($loop->index == 0) echo 'active'; ?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="leftside">
                      <h1>{{$slider->head}}</h1>
                      <h5 style="color: ">{{$slider->desc}}</h5>
                      <div>
                        <button class="btn">PICK UP</button>
                      </div>
                      <div class="socialmedia">
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="rights col-md-6">
                    <img src="{{asset('images/'.$slider->img)}}" alt="">
                  </div>
                </div>

              </div>                
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="categories">
    <div class="container">
      <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
           @foreach($categories as $cat)
               <li class="nav-item" role="presentation">
                

                   <button class="nav-link <?php if($loop->index == 0) echo "active";  ?>"
                       id="{{$cat->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$cat->name}}"
                       type="button" role="tab" aria-controls="{{$cat->name}}"
                       aria-selected="true">
                       <img src="{{asset('images/'.$cat->img)}}" class="img-of-BURR" alt="" style=" ">
                       {{$cat->name}}</button>
               </li>
           @endforeach
        </ul>
       <div class="tab-content" id="myTabContent">
         @foreach ($categories as $catt)
           <div class="tab-pane fade show <?php if($loop->index == 0) echo "active";  ?>" id="{{$catt->name}}" role="tabpanel" aria-labelledby="{{$catt->name}}-tab">
               <div class="row bestsellerss">
                 @foreach ($catt->products->take(6) as $mycat)      
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
           <div class="text-center mt-5">

             <a href="{{ Route('menu') }}"><button class="text-center btn btn-success">See More</button></a>
           </div>
       </div>
      </div>
      {{-- <h1 class="text-center">Categories</h1> --}}
      {{-- <div class="row">
        @foreach ($categories as $category)
          <div class="col">
            <div class="imgdiv">
              <a href="{{Route('category', $category->id)}}">
              <img src="{{asset('images/'.$category->img)}}" alt="" style="width: 70%;">
              <h4>{{$category->name}}</h4></a>
            </div>
          </div>            
        @endforeach
       </div>
      <!-- //boxes -->
      <div class="row" style="margin-top: 80px;">
        @foreach ($new_products as $newpro)
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
      </div> --}}
    </div>
  </div>
  <div class="bestsellers">
    <div class="container">
      <h1 class="text-center">Best Sellers</h1>
      <div class="row">
        @foreach ($pop_products as $pop)
          <div class="col-lg-4 col-md-6">
            <div class="catbox">
              <div class="imagepreview">
                <a href="{{Route('product', $pop->id)}}"><img src="{{asset('images/'.$pop->img)}}" alt=""></a>
              </div>
              <div class="catdet">
                <a href="{{Route('product', $pop->id)}}"><h1>{{$pop->name}}</h1></a>
                  <a href="{{Route('product', $pop->id)}}"><p>{{substr($pop->desc, 0, 70)}} </p></a>
                <a href="{{Route('product', $pop->id)}}"><h2>{{$pop->price}}$</h2></a>
                @if ($pop->count > 0)
                                      <form action="{{route('AddToCart', $pop->id)}}" method="POST">
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
  </div>



  <div class="testmon">
    <div class="container">
      <div class="row">
        <h1 class="divHead">Reviews</h1>
        <div class="col-md-12">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="userss">
                  <img src="img/avatar.png" alt="">

                  <h1>Faris Dahlul</h1>
                  <p>Lorem ipsum dolor sit amet, <br/>consectetuer adipiscing elit, sed </p>
                </div>

              </div>
              <div class="carousel-item">
                <div class="userss">
                  <img src="img/avatar.png" alt="">

                  <h1>Faris Dahlul</h1>
                  <p>Lorem ipsum dolor sit amet, <br/>consectetuer adipiscing elit, sed </p>
                </div>

              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

 
@endsection