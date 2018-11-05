@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Create Event</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                
                    <div class="box box-info">
                            <div class="box-header with-border">
                              <h3 class="box-title"><span class="fa fa-calendar-plus-o"></span> Add New Event</h3>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- <form role="form" action="{{ route('events.store') }}" method="post" files='true'> -->
                                {!! Form::open(['method'=>'POST','action'=>'admin\EventController@store','autocomplete'=>'off','files' => true]) !!}
                                    {{ csrf_field() }}
                                    <!-- Event Name -->
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter event's name...">
                                        </div>

                                    <!-- Event Featured Image -->
                                        <div class="form-group">
                                            <label>Event Featured Image</label>
                                            <input type="file" name="eventimg" class="form-control">
                                            <p style="color:red">Image size : 870 x 470</p>
                                        </div>
                                        
                                    <!-- Description -->
                                        <div class="form-group">
                                            <label>Event Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Decription..."></textarea>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" name="event_date" class="form-control" />
                                        </div>

                                        <button class="btn btn-info pull-right" type="submit" value="Save">Save</button>

                                            
                                {!!Form::close()!!}
                                          
                                    {{-- <form action="{{ route('events.store') }}" method="post">
                                            {{ csrf_field() }}
                                    Event name:
                                    <br />
                                            <input type="text" name="name" />
                                            <br /><br />
                                            Description:
                                            <br />
                                            <textarea name="description"></textarea>
                                            <br /><br />
                                            Start time:
                                            <br />
                                            <input type="date" name="event_date"  />
                                            class="date"
                                            <br /><br />
                                            <button class="btn btn-lg btn-info" type="submit" value="Save">Save</button>
                                            </form> --}}
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                              {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> --}}
                            </div>
                            <!-- /.box-footer -->
                          </div>
            </div>
        </div>
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
    </script>
@stop










