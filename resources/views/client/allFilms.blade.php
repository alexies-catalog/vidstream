@extends('client.layouts.client_lo')
@section('title')
Films - MFI
@stop

@section('customcss')

.form-style-1 input, .form-style-1 select {
  {{-- background-color: #ffffff; --}}
  border: 1px solid #279cd3;
  color:white;
  background-color: #192c3a !important;
}
.form-style-1 input:focus {
  {{-- background-color: #ffffff; --}}
  border: 1px solid #dd5900;
}

.form-style-1 input, .form-style-1 select {
  {{-- background-color: #ffffff; --}}
  border: 1px solid #279cd3;
  background-color: #192c3a !important;
  {{-- color: #120e0f; --}}
  color:white;
  border-radius: 0px !important;
  font-weight: bold;
  font-size: smaller;

}

#catalogdiv > div.col-md-4.col-xs-12.col-sm-12 > div > div > form > div > div > div > select {
  font-style: oblique;
  font-weight: bold;
  font-size: smaller;



  font-weight: bold;
  font-size: smaller;
}


#catalogdiv > div.col-md-4.col-xs-12.col-sm-12 > div > div > form > div > div:nth-child(3) > div > select > option:nth-child(1){

}

#catalogdiv > div.col-md-4.col-xs-12.col-sm-12 > div > div > form > div > div > div > select > option{
  font-style: normal;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  {{-- color: #120E0F !important; --}}
  color: #fff !important;
  font-style: oblique;
}
::-moz-placeholder { /* Firefox 19+ */
  {{-- color: #120E0F !important; --}}
  color: #fff !important;
}
:-ms-input-placeholder { /* IE 10+ */
  color: #fff !important;
}
:-moz-placeholder { /* Firefox 18- */
  color: #fff !important;
}
.hero .hero-ct {
  padding-top: 135px;
}
@stop



@section('contents')

<!--SLIDER-->
{{-- <div class="slider movie-items" style="background-image: url('images/bg-mfi.png')">
  <div class="container">
    <div class="row">

      <div  class="slick-multiItemSlider">

      <div> 

          <div class="trailers" style="padding-top: 0px;padding-bottom: 0px;     background-color: unset;">
              <div class="container">
                <div class="row ipad-width">
                  <div class="col-md-12" style=" padding-left: 0px !important;">
          
                    <div class="videos">
                        <div class="slider-for-2 video-ft">
                        @foreach($films as $film)
                          <div>
                            <iframe class="item-video" src="" data-src="{{$film->youtube_url}}"></iframe>
                          </div>
                        @endforeach
                      </div>
                      <div class="slider-nav-2 thumb-ft">

                        @foreach($films as $film)
                        <div class="item">
                            <div class="trailer-img">
                              <img src="images/uploads/trailer7.jpg"  alt="photo by Barn Images" width="4096" height="2737">
                            </div>
                            <div class="trailer-infor">
                            <h4 class="desc">{{$film->title}}</h4>
                              <p>2:30</p>
                            </div>
                          </div>
                        @endforeach

                      </div>
                    </div>   
                  </div>
                </div>
              </div>
            </div>

      </div>
  
      </div>
    </div>
  </div>
</div> --}}
<!--.end of SLIDER-->




<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-ct">
            <h1><!--<span class="fa fa-film"></span>&nbsp;&nbsp;-->Films</h1>
              {{-- <ul class="breadcumb">
                <li class="active"><a href="#">Home</a></li>
                <li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
              </ul> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
    <app-film-component></app-film-component>


@stop

@section('customjs')

@stop
