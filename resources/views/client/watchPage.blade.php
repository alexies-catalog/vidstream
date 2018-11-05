@extends('client.layouts.client_lo')
@section('title')
Watch This Film - MFI
@stop

@section('customcss')
@stop

@section('contents')

<div class="hero common-hero" style="height: 180px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					{{-- <h1> Event Details</h1> --}}
					{{-- <ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> blog listing</li>
					</ul> --}}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="trailers">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				{{-- <div class="title-hd">
                    <h1>Wonder Woman <small><small>( 2017 )</small></small></h1>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div> --}}
				<div class="blog-detail-ct">
					<h1>Wonder Woman <span>(2017)</span></h1>
				</div>
				<div class="videos">
				 	<div class="slider-for-2 video-ft">
						<video class="item-video" controls autoplay preload="">
								<source type="video/mp4" src="{{asset('videos/boom.mp4')}}" />
								Your browser does not support the video tag.
							</video>
						
					</div>
				
				</div>   
			</div>
		</div>
	</div>
</div>

@stop

@section('customjs')
@stop