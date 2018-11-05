@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Edit Event</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
        {!! Form::model($event, ['method'=>'PATCH','action'=>['admin\EventController@update',$event->id],'autocomplete'=>'off','files' => true]) !!}
            Event name:
            <br />
            <input class="form-control" type="text" name="name" value="{{ $event->name }}" />
            <br /><br />
            Event Featured Image:
            <br />
            <input onchange="readdisplayImg1(this)" class="form-control" type="file" name="eventimg"/>
            <p style="color:red">Image size : 870 x 470</p>
            <img class="displayImg1" src="{{ asset($event->eventimg) }}" alt="your image"  />
            <br /><br />
            Event description:
            <br />
            <textarea class="form-control" name="description">{{ $event->description }}</textarea>
            <br /><br />
            Start time:
            <br />
            <input class="form-control" type="date" value="{{ $event->event_date }}" name="event_date" class="date"  />
            <br /><br />
            <input type="submit" value="Save" />
        {!!Form::close()!!}
    </div>
@stop

@section('css')
  
@stop

@section('js')
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
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
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });

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










