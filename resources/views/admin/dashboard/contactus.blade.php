@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contact-us</h1>
@stop

@section('content')
<div class="row" style="padding:10px;">
    <div class="box">
        <div class="box-header with-border">
            
                <div class="form-group">
                    <h3>Messages</h3>
                </div>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-md-12">
                    

                        <table id="example" class="display table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width:50%">Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->message}}</td>
                                    <td>{{$message->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    <script>$('#example').DataTable({
            "order": [
                [ 2, "desc" ]
            ]
        });
    </script>
@stop