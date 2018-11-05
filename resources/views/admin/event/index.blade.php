
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Calendar</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        
        <div id='calendar'></div>
        </div>
    </div>
@stop



@section('js')
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
            url : '{{ route('events.edit', $event->id) }}'
            },
            @endforeach
        ]
        })
    });
    </script>
@stop










