@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Equipments</h1>
@stop

@section('content')
<div class="row" style="padding:10px">

    @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success</h4>
            {{session()->get('status')}}
        </div>
    @endif

        
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Update Equipment</h3>
        </div>
        {!! Form::model($equipment, ['method'=>'PATCH','action'=>['admin\EquipmentController@update',$equipment->id],'autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name',null, ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('affiliates', 'Affiliates', ['class' => 'control-label']) !!}
                    {!! Form::url('affiliates',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('img', 'Featured Image', ['class' => 'control-label']) !!}
                    {!! Form::file('img', ['class' => 'form-control','onchange'=>'readURL(this)']); !!}
                    <img class="displayImg" src=" {{ asset($equipment->img) }} " alt="your image" style="{{$equipment->img!='/images/equip/' ? '' : 'display:none'}}" />
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Update Equipment',['class' => 'btn btn-info pull-right']) !!}
            </div>

        {!!Form::close()!!}
</div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    {{-- <script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script> --}}
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.displayImg')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    
@stop