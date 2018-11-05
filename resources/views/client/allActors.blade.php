@extends('client.layouts.client_lo')
@section('title')
Actors - MFI
@stop

@section('customcss')
@stop

@section('contents')

<div class="hero common-hero">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="hero-ct">
                    <h1><span class="fa fa-star-o"></span>&nbsp;&nbsp;Casts</h1>
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
    <app-cast-component></app-cast-component>
    <!--end of celebrity grid v1 section-->

@stop

@section('customjs')
@stop