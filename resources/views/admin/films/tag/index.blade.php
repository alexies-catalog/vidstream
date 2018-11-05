@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-5">
            @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success</h4>
                    {{session()->get('status')}}
                </div>
            @endif
                <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Add New Tag</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['method'=>'POST','action'=>'admin\TagController@store','autocomplete'=>'off']) !!}
                          <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                {!! Form::text('name','', ['required' => 'required','class' => 'form-control']) !!}
                                <p><i>The name is how it appears on your site.</i></p>
                            </div>
                            {{-- <div class="form-group">
                                {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                                {!! Form::text('slug','', ['class' => 'form-control']) !!}
                                <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
                            </div> --}}
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                                {!! Form::submit('Add New Tag',['class' => 'btn btn-info pull-right']) !!}
                            </div>
                          <!-- /.box-footer -->
                          {!!Form::close()!!}
                </div>
        </div>
        <div class="col-md-7">
                <div class="box">
                        <form method="post" action="/delete/tag" class="form-inline">
                            @method('DELETE')
                            @csrf
                        <div class="box-header with-border">
                            
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
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tags as $tag)
                                                <tr>
                                                <td><input type="checkbox" value="{{$tag->id}}" name="delCheckBox[]" class="checkBoxes"></td>
                                                    <td>{{$tag->name}}</td>
                                                    <td>{{$tag->slug}}</td>
                                                    <td><a data-toggle="tooltip" title="Update" href="{{action('admin\TagController@edit',$tag->slug)}}"><span><i class="fa fa-edit" style="font-size:24px"></i></span></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Actions</th>
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
<script>
    var data = $('#example').DataTable({
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