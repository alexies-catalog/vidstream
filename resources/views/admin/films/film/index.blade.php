@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Films</h1>
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
    <div class="box">
        <form method="post" action="/admin/delete/film" class="form-inline">
            @method('DELETE')
            @csrf
        <div class="box-header with-border">
            <a href="{{route('film.create')}}" class="btn btn-info pull-right">Add New Film</a>
            
                <div class="form-group">
                    <select name="delCheckBox" id="" class="form-control">
                        <option value="delete">Delete</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Apply" class="form-control btn btn-primary">
                </div>
        </div>
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-md-12">
                    

                        <table id="example" class="display table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:5px"><input type="checkbox" name="" id="options"></th>
                                    <th>Title</th>
                                    <th>Director</th>
                                    <th>Producer</th>
                                    <th>Writer</th>
                                    <th>Genre</th>
                                    <th>Tags</th>
                                    <th>Running Time</th>
                                    <th>Year Finish</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($films as $film)
                                <tr>
                                <td><input type="checkbox" value="{{$film->id}}" name="delCheckBox[]" class="checkBoxes"></td>
                                    <td>{{$film->title}}</td>
                                    <td>
                                        @foreach ($film->members as $member)
                                            @if($member->pivot->member_profession == 'Director')
                                                {{ $member->pivot->member_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($film->members as $member)
                                            @if($member->pivot->member_profession == 'Producer')
                                                
                                                {{ $member->pivot->member_name }},

                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($film->members as $member)
                                            @if($member->pivot->member_profession == 'Writer')
                                                {{ $member->pivot->member_name }},
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($film->genres as $genre)
                                            {{ $genre->name }},&nbsp;
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($film->tags as $tag)
                                            {{ $tag->name }},&nbsp;
                                        @endforeach
                                    </td>
                                    <td>{{$film->runningtime}}</td>
                                    <td>{{$film->yearfinish}}</td>
                                    <td>{{$film->created_at}}</td>
                                    <td><a data-toggle="tooltip" title="Update" href="{{action('admin\FilmController@edit',$film->id)}}"><span><i class="fa fa-edit" style="font-size:24px"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Director</th>
                                    <th>Producer</th>
                                    <th>Writer</th>
                                    <th>Running Time</th>
                                    <th>Year Finish</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
    <script>$('#example').DataTable({
        columnDefs: [ { orderable: false, targets: [0,10] }],
        "order": [
            [ 9, "desc" ]
        ]
    });
    
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('input#options').on('click',function () {
            if (this.checked) {
                $('.checkBoxes').each(function(){
                    this.checked = true;
                })
            } else {
                $('.checkBoxes').each(function(){
                    this.checked = false;
                })
            }
        });
    })
    </script>
@stop