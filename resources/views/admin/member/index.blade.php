@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MFI Members</h1>
@stop

@section('content')
<div class="row" style="padding:10px">
        {{-- <form class="form-inline" role="form">
            <div class="form-group">
                    <select class="form-control">
                        @foreach ($profes as $profe)
                            <option value="{{ $profe->id }}">{{ $profe->name }}</option>
                        @endforeach
                    </select>
                </div>
          <button type="submit" class="btn btn-default">Filter</button>
        </form> --}}
    <div class="box">
        <form method="post" action="{{ route('member-bulk') }}" class="form-inline">
            @method('DELETE')
            @csrf
        <div class="box-header with-border">
            <a href="{{ route('member.create') }}" class="btn btn-info pull-right">Add New MFI Member</a>
            
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
                                    <th style="width:5px"><input type="checkbox" name="" class="options checkBoxes"></th>
                                    <th>Name</th>
                                    <th>Profession</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                <tr>
                                <td><input type="checkbox" value="{{$member->id}}" name="delCheckBox[]" class="checkBoxes"></td>
                                    <td>{{$member->name}}</td>
                                    <td>
                                        @foreach ($member->professions as $prof)
                                            {{ $prof->name }},&nbsp;
                                        @endforeach
                                    </td>
                                    <td>{{$member->created_at}}</td>
                                    <td><a data-toggle="tooltip" title="Update" href="{{action('admin\MemberController@edit',$member->slug)}}"><span><i class="fa fa-edit" style="font-size:24px"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" name="" class="options checkBoxes"></th>
                                    <th>Name</th>
                                    <th>Profession</th>
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
        columnDefs: [ { orderable: false, targets: [0,4] }],
        "order": [
            [ 2, "desc" ]
        ]
    });
    
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('input.options').on('click',function () {
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