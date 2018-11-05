@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Appearance Settings</h1>
@stop

@section('content')


<div class="row" style="padding:10px ;">
    @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success</h4>
            {{session()->get('status')}}
        </div>
    @endif
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Appearance</h3>
        </div>
        {!! Form::model($appearance, ['method'=>'PATCH','action'=>['admin\AppearanceController@update',$appearance->id],'autocomplete'=>'off','files' => true]) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('logo_url', 'Logo', ['class' => 'control-label']) !!}
                    {!! Form::file('logo_url', ['class' => 'form-control', 'onchange'=>'readdisplayImg1(this)']); !!}
                    <img class="displayImg1" src="{{ $appearance->logo_url }}" alt="your image"  />
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'About Text', ['class' => 'control-label']) !!}
                    {!! Form::textarea('about',null, ['class' => 'form-control', 'id'=>'abouttextarea']); !!}
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
                        {!! Form::label('gmail_link', 'Google+', ['class' => 'control-label']) !!}
                        {!! Form::url('gmail_link',null, ['class' => 'form-control']); !!}
                    </div>
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
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    height : 500,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);

    function readdisplayImg1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.displayImg1')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop