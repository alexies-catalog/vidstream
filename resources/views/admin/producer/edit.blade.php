@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Producers</h1>
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
          <h3 class="box-title">Update Producer</h3>
        </div>
        {!! Form::model($producer, ['method'=>'PATCH','action'=>['admin\ProducerController@update',$producer->id],'autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name',null, ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('awards', 'Awards', ['class' => 'control-label']) !!}
                    {!! Form::text('awards',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'About', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('halloffame', 'Hall of Fame', ['class' => 'control-label']) !!}
                    {!! Form::url('halloffame',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('profilepic', 'Featured Image', ['class' => 'control-label']) !!}
                    {!! Form::file('profilepic', ['class' => 'form-control','onchange'=>'readURL(this)']); !!}
                    <img class="displayImg" src=" {{ asset("$producer->profilepic") }} " alt="your image" style="width:270px;height:400px"/>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Update Producer',['class' => 'btn btn-info pull-right']) !!}
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
    <script>function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('.displayImg')
                        .attr('src', e.target.result);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }</script>
@stop