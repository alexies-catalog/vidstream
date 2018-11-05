@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add New Films</h1>
@stop

@section('content')
<div id="app">
	<div class="row" style="padding:10px">
	
		<div class="box box-info">
	        <div class="box-header with-border">
	          	<h3 class="box-title">Edit Film</h3>
	        </div>
        {!! Form::model($film, ['method'=>'PATCH','action'=>['admin\FilmController@update',$film->id],'autocomplete'=>'off','files' => true]) !!}
	            <div class="box-body">
	                <div class="form-group">
	                	<label for="title">Title</label>
	                	<input class="form-control" value="{{ $film->title }}" required name="title">
	                </div>
	                <div class="form-group">
	                	<label for="synopsis">Synopsis</label>
	                	<textarea class="form-control" rows="5" id="synopsis" name="synopsis">{{ $film->synopsis }}</textarea>
	                </div>
	                <div class="form-group">
	                	<label for="award">Awards</label>
	                	<textarea class="form-control" rows="5" id="award" name="award">{{ $film->award }}</textarea>
	                </div>
	                <div class="form-group">
	                	<label for="yearfinish">Year Finish</label>
	                	<input class="form-control" value="{{ $film->yearfinish }}" type="number" min="1900" max="2099" step="1" name="yearfinish" />
	                </div>
	                <div class="form-group">
	                	<label for="runningtime">Running Time</label>
	                	<input class="form-control" value="{{ $film->runningtime }}" type="text" name="runningtime" />
	                </div>
	                <div class="form-group">
	                	<label for="youtube_url">Youtube URL</label>
	                	<input class="form-control" value="{{ $film->youtube_url }}" type="url" name="youtube_url" />
	                </div>

	                <div class="form-group">
	                	<label for="photo">Poster</label>
	                	<input onchange="readPhoto(this)" class="form-control" type="file" name="photo" />
                    	<p style="color:red"><strong>Image size : 285 x 437</strong></p>
                    	<img class="photo" src=" {{ asset($film->photo) }} " alt="your image" />
	                </div>

	                <div class="form-group">
	                	<label for="single_photo">Header Image</label>
	                	<input onchange="readSingle(this)" class="form-control" type="file" name="single_photo" />
                    	<p style="color:red"><strong>Image size : 1920 x 806</strong></p>
                    	<img class="single" src=" {{ asset($film->single_photo) }} " alt="your image"  />
	                </div>

	                <div class="form-group">
	                	<label for="file_name">Film Still</label>
	                	<input class="form-control" type="file" multiple name="file_name[]" />
	                	<a href="#" data-toggle="modal" data-target="#showpictures"> Show Still Pictures</a>
	                </div>

	                <div class="form-group">
	                	<label for="director">Director</label>
	                	<select class="form-control" name="director" >
						  	<option></option>
						  	@foreach ($members as $member)
						    <option value="{{ $member->id }},{{ $member->name }}">{{ $member->name }}</option>
						    @endforeach
					  	</select>
	                </div>

	                <div class="form-group">
	                	<label>Producer</label>
	                </div>
	                <app-admin-producer-component></app-admin-producer-component>

	                <div class="form-group">
	                	<label>Writer</label>
	                </div>
	                <app-admin-writer-component></app-admin-writer-component>

	                <div class="form-group">
	                	<label>Cast</label>
	                </div>
	                <app-admin-cast-component></app-admin-cast-component>

	                <div class="form-group">
	                	<label>Other Crew</label>
	                </div>
	                <app-admin-crew-component></app-admin-crew-component>

	                <div class="form-group">
	                    <h4><strong>Genres</strong></h4>
	                    @foreach ($genres as $genre)        

	                    <div class="col-md-3">

	                        {!! Form::checkbox( 'genre[]', "{$genre->id}", false, ['class' => 'gen']) !!}
	                        {!! Form::label('genre', "{$genre->name}", ['class' => ['control-label','checkbox-inline']]) !!}
	                    </div>
	                    @endforeach
	                </div><br><br>

	                <div class="form-group">
	                    <h4><strong>Tags</strong></h4>
	                    @foreach ($tags as $tag)        

	                    <div class="col-md-3">

	                        {!! Form::checkbox( 'tag[]', "{$tag->id}", false, ['class' => 'tag']) !!}
	                        {!! Form::label('tag', "{$tag->name}", ['class' => ['control-label','checkbox-inline']]) !!}
	                    </div>
	                    @endforeach
	                </div><br><br><br>

	                <div class="form-group">
	                    <h4><strong>Category</strong></h4>
	                    @foreach ($cats as $cat)        

	                    <div class="col-md-3">

	                        {!! Form::checkbox( 'cat[]', "{$cat->id}", false, ['class' => 'cat']) !!}
	                        {!! Form::label('cat', "{$cat->name}", ['class' => ['control-label','checkbox-inline']]) !!}
	                    </div>
	                    @endforeach
	                </div>


	            </div>
	            <div class="box-footer">
	            	<input type="submit" class="btn btn-primary" value="Save">	
	            </div>
        {!!Form::close()!!}
    	</div>

	</div>

	<!-- Modal -->
<div id="showpictures" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Film Still</h4>
      </div>
      <div class="modal-body">
      	<div class="container">
        <div class="row">
        	@foreach($stills as $still)
		  <div class="column">
		  	
		  	{!! Form::open(['method'=>'DELETE','action'=>['admin\StillController@destroy', $still->id]]) !!}
		  	
			    <img src="{{ asset($still->file_name) }}"><br />
			    <input type="submit" class="btn btn-danger" value="Delete">
		    
		    {!!Form::close()!!}
		    
		  </div>
		  @endforeach
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
@stop

@section('css')
    
@stop

@section('js')
	<script src="{{ asset('js/app.js') }}"></script>

	<script type="text/javascript">
	$(document).ready(function(){
        var genre = {!! json_encode($film->genres) !!};
        // console.log(prof)

        genre.forEach(element => {
            // console.log(element['id']);
            $('input.gen[type=checkbox][value='+element['id']+']').prop("checked",true);
        });

        var tag = {!! json_encode($film->tags) !!};
        // console.log(prof)

        tag.forEach(element => {
            // console.log(element['id']);
            $('input.tag[type=checkbox][value='+element['id']+']').prop("checked",true);
        });

        var cat = {!! json_encode($film->categories) !!};
        // console.log(prof)

        cat.forEach(element => {
            // console.log(element['id']);
            $('input.cat[type=checkbox][value='+element['id']+']').prop("checked",true);
        });
    })

		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
    ]) !!}
	</script>
	<script>
    function readSingle(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.single')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script>
    function readPhoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.photo')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
@stop