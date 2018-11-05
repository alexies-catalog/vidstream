@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Equipments</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Equipment</h3>
        </div>
        {!! Form::open(['method'=>'POST','action'=>'admin\EquipmentController@store','autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name','', ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('affiliates', 'Affiliates', ['class' => 'control-label']) !!}
                    {!! Form::url('affiliates','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('img', 'Featured Image', ['class' => 'control-label']) !!}
                    {!! Form::file('img', ['class' => 'form-control']); !!}
                    {{-- <img class="displayImg" src="http://placehold.it/280" alt="your image" style="width:280px;height:280px;" /> --}}
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Add New Equipment',['class' => 'btn btn-info pull-right']) !!}
            </div>

        {!!Form::close()!!}
</div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    <script>
    // function readURL(input) {
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();
        
    //             reader.onload = function (e) {
    //                 $('.displayImg')
    //                     .attr('src', e.target.result);
    //             };
        
    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }
    </script>
@stop