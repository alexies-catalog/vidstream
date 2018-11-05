@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MFI Member</h1>
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
          <h3 class="box-title">Add New MFI Member</h3>
        </div>
        {!! Form::model($member, ['method'=>'PATCH','action'=>['admin\MemberController@update',$member->id],'autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name',null, ['required' => 'required','class' => 'form-control']) !!}
                    <p><i>The name is how it appears on your site.</i></p>
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'About', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('profilepic', 'Profile Picture', ['class' => 'control-label']) !!}
                    {!! Form::file('profilepic', ['class' => 'form-control' , 'onchange' => 'readURL(this)']); !!}
                    <p style="color:red"><strong>Image size : 270 x 400</strong></p>
                    <img class="displayImg" src="{{ asset($member->profilepic) }}" alt="your image" />
                </div>
                <div class="form-group">
                    {!! Form::label('coverphoto', 'Header Picture', ['class' => 'control-label']) !!}
                    {!! Form::file('coverphoto', ['class' => 'form-control' , 'onchange' => 'readURL2(this)']); !!}
                    <p style="color:red"><strong>Image size : 1920 x 806</strong></p>
                    <img class="displayImg2" src="{{ asset($member->coverphoto) }}" alt="your image" />
                </div>
                <div class="form-group">
                    {!! Form::label('halloffame', 'Hall of Fame', ['class' => 'control-label']) !!}
                    {!! Form::url('halloffame',null, ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('workshop', 'MFI Workshop/s Attended', ['class' => 'control-label']) !!}
                    {!! Form::textarea('workshop',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('awards', 'Awards', ['class' => 'control-label']) !!}
                    {!! Form::textarea('awards',null, ['class' => 'form-control']) !!}
                </div>
                <h4><strong>Social Links</strong></h4>
                <div style="padding:20px ;">
                    <div class="form-group">
                        {!! Form::label('fb_link', 'Facebook', ['class' => 'control-label']) !!}
                        {!! Form::url('fb_link',null, ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tw_link', 'Twitter', ['class' => 'control-label']) !!}
                        {!! Form::url('tw_link',null, ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ig_link', 'Instagram', ['class' => 'control-label']) !!}
                        {!! Form::url('ig_link',null, ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('li_link', 'Linked In', ['class' => 'control-label']) !!}
                        {!! Form::url('li_link',null, ['class' => 'form-control']); !!}
                    </div>
                </div>
                <div class="form-group">
                    <h4><strong>Professions</strong></h4>
                    @foreach ($profs as $pro) 
                    
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
    $(document).ready(function(){
        var prof = {!! json_encode($member->professions) !!};
        // console.log(prof)

        prof.forEach(element => {
            // console.log(element['id']);
            $('input[type=checkbox][value='+element['id']+']').prop("checked",true);
        });
    })
    

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
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('.displayImg2')
                        .attr('src', e.target.result);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop