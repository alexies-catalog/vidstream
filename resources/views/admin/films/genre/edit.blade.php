@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Genre</h1>
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
                          <h3 class="box-title">Update Genre</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::model($genre,['method'=>'PATCH','action'=>['admin\GenreController@update',$genre->id],'autocomplete'=>'off']) !!}
                          <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                {!! Form::text('name',null, ['required' => 'required','class' => 'form-control']) !!}
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
                                {!! Form::submit('Update Genre',['class' => 'btn btn-info pull-right']) !!}
                            </div>
                          <!-- /.box-footer -->
                          {!!Form::close()!!}
                </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
@stop