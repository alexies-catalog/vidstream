@extends('client.layouts.client_lo')
@section('title')
Directors - MFI
@stop

@section('customcss')
@stop

@section('contents')



    <div class="hero common-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="hero-ct">
              <h1><span class="fa fa-bullhorn"></span>&nbsp;&nbsp;Directors</h1>
                {{-- <ul class="breadcumb">
                  <li class="active"><a href="#">Home</a></li>
                  <li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
                </ul> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- celebrity grid v1 section-->
    <app-director-component></app-director-component>
    <!--end of celebrity grid v1 section-->

 



    @stop

@section('customjs')
@stop