@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Professions</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="display table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:5px">ID</th>
                                        <th style="width:50%">Name</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professions as $pro)
                                    <tr>
                                        <td>{{$pro->id}}</td>
                                        <td>{{$pro->name}}</td>
                                        <td>{{$pro->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width:5px">ID</th>
                                        <th style="width:50%">Name</th>
                                        <th>Date Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
    <script>
    // $('#example').DataTable({
    //     columnDefs: [ { orderable: false, targets: [0,3] }],
    //     "order": [
    //         [ 2, "desc" ]
    //     ]
    // });
    
    // $(document).ready(function(){
    //     $('[data-toggle="tooltip"]').tooltip();
    //     $('input#options').on('click',function () {
    //         if (this.checked) {
    //             $('.checkBoxes').each(function(){
    //                 this.checked = true;
    //             })
    //         } else {
    //             $('.checkBoxes').each(function(){
    //                 this.checked = false;
    //             })
    //         }
    //     });
    // })
    </script>
@stop