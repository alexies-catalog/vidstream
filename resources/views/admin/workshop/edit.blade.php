@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Workshop</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Workshop</h3>
        </div>
        {!! Form::model($workshop, ['method'=>'PATCH','action'=>['admin\WorkshopController@update', $workshop->id],'autocomplete'=>'off','files' => true]) !!}
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
                <div class="form-group col-md-6">
                    {!! Form::label('start_date', 'Start Date', ['class' => 'control-label']) !!}
                    <input size="16" type="text" value="{{$workshop->start_date}}" data-link-field="dtp_input1" data-date-format="dd MM yyyy - HH:ii p" readonly class="form_datetime form-control">
                    <input name="start_date" type="hidden" id="dtp_input1" value="{{$workshop->start_date}}" />
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('end_date', 'End Date', ['class' => 'control-label']) !!}
                    <input size="16" data-link-field="dtp_input2" value="{{$workshop->end_date}}" type="text" data-date-format="dd MM yyyy - HH:ii p" readonly class="form_datetime form-control">
                    <input name="end_date" type="hidden" id="dtp_input2" value="{{$workshop->end_date}}" />
                </div>
                <div class="form-group">
                    {!! Form::label('workshopimg', 'Featured Image', ['class' => 'control-label']) !!}
                    {!! Form::file('workshopimg', ['class' => 'form-control']); !!}
                    <p style="color:red"><strong>Image size : 870 x 470</strong></p>
                    <img class="displayImg1" src="{{ asset($workshop->workshopimg) }}" alt="your image"  />
                </div>
                <br> <br>
            </div>
            <div class="box-footer">
                {!! Form::submit('Save',['class' => 'btn btn-info pull-right']) !!}
            </div>

        {!!Form::close()!!}
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/locales/bootstrap-datetimepicker.fr.js') }}" ></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            showMeridian: 1,
        });
    </script>     
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
    </script>
    <script>
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