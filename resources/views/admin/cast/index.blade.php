@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Casts</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="box">
        <form method="post" action="/delete/cast" class="form-inline">
            @method('DELETE')
            @csrf
        <div class="box-header with-border">
            <a href="{{route('cast.create')}}" class="btn btn-info pull-right">Add New Cast</a>
            
                <div class="form-group">
                    <select name="delCheckBox" id="" class="form-control">
                        <option value="delete">Delete</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Apply" class="form-control btn btn-primary">
                </div>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-md-12">
                    

                        <table id="example" class="display table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:5px"><input type="checkbox" name="" id="options"></th>
                                    <th style="width:50%">Name</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($casts as $cast)
                                <tr>
                                <td><input type="checkbox" value="{{$cast->id}}" name="delCheckBox[]" class="checkBoxes"></td>
                                    <td>{{$cast->name}}</td>
                                    <td>{{$cast->created_at}}</td>
                                    <td><a data-toggle="tooltip" title="Update" href="{{action('admin\CastController@edit',$cast->slug)}}"><span><i class="fa fa-edit" style="font-size:24px"></i></span></a>
                                        {{-- <a href="{{action('EquipmentController@show',$equip->slug)}}"><span><i class="fa fa-eye" style="font-size:24px"></i></span></a> --}}
                                        {{-- <button type="submit" name="delete_one" value="delete" class="btn-link"><span><i class="fa fa-eye" style="font-size:24px;color:red"></i></span></button> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    <script>$('#example').DataTable({
        columnDefs: [ { orderable: false, targets: [0,3] }],
        "order": [
            [ 2, "desc" ]
        ]
    });
    
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('input#options').on('click',function () {
            if (this.checked) {
                $('.checkBoxes').each(function(){
                    this.checked = true;
                })
            } else {
                $('.checkBoxes').each(function(){
                    this.checked = false;
                })
            }
        });
    })
    </script>
@stop