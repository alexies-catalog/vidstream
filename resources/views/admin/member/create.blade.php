@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MFI Member</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add New MFI Member</h3>
        </div>
        {!! Form::open(['method'=>'POST','action'=>'admin\MemberController@store','autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name','', ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'About', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('profilepic', 'Profile Picture', ['class' => 'control-label']) !!}
                    {!! Form::file('profilepic', ['class' => 'form-control']); !!}
                    <p style="color:red"><strong>Image size : 270 x 400</strong></p>
                    {{-- <img class="displayImg" src="http://placehold.it/280" alt="your image" style="width:280px;height:280px;" /> --}}
                </div>
                <div class="form-group">
                    {!! Form::label('coverphoto', 'Header Picture', ['class' => 'control-label']) !!}
                    {!! Form::file('coverphoto', ['class' => 'form-control']); !!}
                    <p style="color:red"><strong>Image size : 1920 x 806</strong></p>
                </div>
                <div class="form-group">
                    {!! Form::label('halloffame', 'Hall of Fame', ['class' => 'control-label']) !!}
                    {!! Form::url('halloffame','', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('workshop', 'MFI Workshop/s Attended', ['class' => 'control-label']) !!}
                    {!! Form::textarea('workshop','', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('awards', 'Awards', ['class' => 'control-label']) !!}
                    {!! Form::textarea('awards','', ['class' => 'form-control']) !!}
                </div>
                <h4><strong>Social Links</strong></h4>
                <div style="padding:20px ;">
                    <div class="form-group">
                        {!! Form::label('fb_link', 'Facebook', ['class' => 'control-label']) !!}
                        {!! Form::url('fb_link','', ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tw_link', 'Twitter', ['class' => 'control-label']) !!}
                        {!! Form::url('tw_link','', ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ig_link', 'Instagram', ['class' => 'control-label']) !!}
                        {!! Form::url('ig_link','', ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('li_link', 'Linked In', ['class' => 'control-label']) !!}
                        {!! Form::url('li_link','', ['class' => 'form-control']); !!}
                    </div>
                </div>
                <div class="form-group">
                    <h4><strong>Professions</strong></h4>
                    @foreach ($professions as $pro)        
                    
                    <div class="col-md-3">

                        {!! Form::checkbox( 'professions[]', "{$pro->id}", false) !!}
                        {!! Form::label('professions', "{$pro->name}", ['class' => ['control-label','checkbox-inline']]) !!}
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Save',['class' => 'btn btn-info pull-right']) !!}
            </div>

        {!!Form::close()!!}
</div>
</div>


@stop

@section('css')
    
@stop

@section('js')
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