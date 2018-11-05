@extends('client.layouts.client_lo')
@section('title')
Catalog - MFI
@stop

@section('customcss')
.movie-item-style-2 {
	align-items: normal;
}
.movie-item-style-2 .mv-item-infor .describe {
    padding-bottom: 12px;
	{{-- border-bottom: 1px solid rgb(182,125,52 ); --}}
    border-bottom: 1px solid #279cd3;	
    margin-bottom: 12px;
}
{{-- .topbar-filter select{
	border-left: 1px solid rgb(210,107,38);
	border-right: 1px solid rgb(210,107,38);
} --}}
.topbar-filter select {
    border-left: 1px solid #279cd3;
    border-right: 1px solid #279cd3;
}
@stop

@section('contents')


<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1><!--<span class="fa fa-book"></span>&nbsp;&nbsp;-->Catalog</h1>
					{{-- <ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
					</ul> --}}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- celebrity grid v2 section-->
<div class="page-single">
	<div class="container">
		<app-catalog-component></app-catalog-component>
	</div>
</div>
<!-- end of celebrity grid v2 section-->

@stop

@section('customjs')
@stop