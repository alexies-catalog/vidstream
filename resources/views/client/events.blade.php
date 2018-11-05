@extends('client.layouts.client_lo')
@section('title')
Events - MFI
@stop

@section('customcss')

#login-content,#signup-content{
    display:none !important;
}

#calendar{
    overflow-y: auto-scroll;
}
h2{
    font-family: 'Dosis', sans-serif;
    color: #171820;
}
#calendar ::-webkit-scrollbar {
    width: 5px;
    border-radius: 4px;
}
#calendar ::-webkit-scrollbar-thumb {
    background: #e0e0e0;
    width: 7px;
    border-radius: 10px;
}
#calendar ::-webkit-scrollbar-track {
    background: transparent;
}
th, thead.fc-head{
  //  background-color: #f6931e;
    border: none;
}
.fc th{
    padding-top: 12px;
}
.fc-day-header .fc-widget-header .fc-sun> span {
    color: white;
}

.buster-light .page-single {
    background-color: #120d0e;
}

#calendar > div.fc-toolbar.fc-header-toolbar > div.fc-left > h2{
    color:white;
}
#calendar > div.fc-toolbar.fc-header-toolbar > div.fc-right > button{
    background:unset;
    color:white;
}

#calendar > div.fc-toolbar.fc-header-toolbar{
    border: 2px;
    border-bottom-style: solid;
    border-bottom-color: #e06b26;
    padding-bottom: 20px;
    margin-bottom: 40px;
}


#calendar > div.fc-toolbar.fc-header-toolbar > div.fc-right > div > button.fc-prev-button.fc-button.fc-state-default.fc-corner-left{
    background: unset;
    color: white;
    margin-right: 20px;
    box-shadow: unset;
}


#calendar > div.fc-toolbar.fc-header-toolbar > div.fc-right > div > button.fc-next-button.fc-button.fc-state-default.fc-corner-right{

  background: unset;
    color: white;

    box-shadow: unset;
}

@stop

@section('contents')


<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1><!--<span class="fa fa-calendar-check-o"></span>&nbsp;&nbsp; -->Events</h1>
					{{-- <ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> blog listing</li>
					</ul> --}}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog grid section-->
<div class="buster-light">
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        
        <div id='calendar'></div>
        </div>
    </div>	
			</div>
	
		</div>
	</div>
</div>
</div>
<!--end of  blog grid section-->

@stop

@section('customjs')

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
        // put your options and callbacks here
        events : [
            @foreach($events as $event)
            {
            title : '{{ $event->name }}',
            start : '{{ $event->event_date }}',
            url : "{{ route('client-event-show',['event'=>$event->slug]) }}"
            },
            @endforeach
        ]
        })
    });
    </script>

@stop