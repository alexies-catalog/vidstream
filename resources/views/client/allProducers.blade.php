@extends('client.layouts.client_lo')
@section('title')
Alumni - MFI
@stop

@section('customcss')

@media only screen and (min-width: 1200px){
    .celebrity-items{
        justify-content: left;
    }
    .celebrity-items .ceb-item {
        margin-left: 9px;
    }
  }
  body > header > div > nav > div.navbar-header.logo > a > img {
    -webkit-filter: drop-shadow(10px 10px 15px rgba(255, 255, 255, 1));
}
.hero .hero-ct {
    padding-top: 150px;
}
.common-hero {
    height: 295px;
}
@stop

@section('contents')

<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="hero-ct">
                    <h1>&nbsp;&nbsp;
                        @if(Request::get('profession'))
                            {{ Request::get('profession') }}
                        @else
                            Alumni
                        @endif
                    </h1>
                        @if(Request::get('profession'))
                        <ul class="breadcumb">
                            <li class="active"><a href="{{route('client-producers')}}" style="color:white" class="time2">Alumni</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> {{ Request::get('profession') }}</li>
                        </ul>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- celebrity grid v1 section-->
    <app-producer-component></app-producer-component>
    <!--end of celebrity grid v1 section-->

@stop

@section('customjs')
@stop