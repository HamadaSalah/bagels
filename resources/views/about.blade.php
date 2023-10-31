@extends('layouts.app')
@section('content')
<div class="site-wrap">



    <div class="site-blocks-cover inner-page" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto align-self-center introo">
                    <div class=" text-center">
                        <h1>About Us</h1>
                        <p>{{$about->desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="why-us" class="why-us" style="margin-top: 70px;">
        <div class="hero2" id="hero2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12 " data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="content">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="fa fa-eye"></i>
                                <h4 style="">VISON </h4>
                                <p style="">
                                    {{$about->vision}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" data-aos="fade-up"
                        data-aos-delay="200" style="text-align: justify;">
                        <div class="content">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="fa fa-envelope"></i>
                                <h4 style="">MISSION </h4>
                                <p style=" ; text-align: center;">
                                    {{$about->mission}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="content">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="fa fa-clipboard"></i>
                                <h4 style="">VALUE </h4>
                                <p style="">
                                    {{$about->value}}
                                </p>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </section> {{-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="images/{{$about->how_started_img}}" alt="Image placeholder" class="img-fluid rounded">
    <a href="{{$about->how_started_video}}" class="play-button popup-vimeo"><span class="icon-play"></span></a>

    </figure>
</div>
</div>
<div class="col-md-1"></div>
<div class="col-md-5">


    <div class="site-section-heading pt-3 mb-4">
        <h2 class="text-black">How We Started</h2>
    </div>
    <p>{{$about->how_started}}</p>

</div>
</div>
</div>
</div>
--}}


{{-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 order-md-2">
            <div class="block-16">
              <figure>
                <img src="images/{{$about->trusted_img}}" alt="Image placeholder" class="img-fluid rounded">
</figure>
</div>
</div>
<div class="col-md-5 mr-auto">


    <div class="site-section-heading pt-3 mb-4">
        <h2 class="text-black">We Are Trusted Company</h2>
    </div>
    <p class="text-black">{{$about->trusted}}</p>

</div>
</div>
</div>
</div> --}}

<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck text-primary"></span>
                </div>
                <div class="text">
                    <h2>SHOP ONLINE</h2>
                    <p>You Can select your treatment and ship to home</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2 text-primary"></span>
                </div>
                <div class="text">
                    <h2>Working Hours</h2>
                    <p>We Are Working 24 hours in 7 Days to Your Health</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help text-primary"></span>
                </div>
                <div class="text">
                    <h2>Customer Support</h2>
                    <p>You Can Call Us For Any Support and Ask any Details</p>
                </div>
            </div>
        </div>
    </div>
</div>





</div>


@endsection
