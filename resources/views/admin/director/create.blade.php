@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Director</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Director</h3>
        </div>
        {!! Form::open(['method'=>'POST','action'=>'admin\DirectorController@store','autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name','', ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('awards', 'Awards', ['class' => 'control-label']) !!}
                    {!! Form::text('awards','', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'About', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('halloffame', 'Hall of Fame', ['class' => 'control-label']) !!}
                    {!! Form::url('halloffame','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('profilepic', 'Profile Picture', ['class' => 'control-label']) !!}
                    {!! Form::file('profilepic', ['class' => 'form-control']); !!}
                    {{-- <img class="displayImg" src="http://placehold.it/280" alt="your image" style="width:280px;height:280px;" /> --}}
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Add New Director',['class' => 'btn btn-info pull-right']) !!}
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