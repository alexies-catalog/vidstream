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
	          	<h3 class="box-title">Add New Film</h3>
	        </div>
        {!! Form::open(['method'=>'POST','action'=>'admin\FilmController@store','autocomplete'=>'off','files' => true]) !!}
	            <div class="box-body">
	                <div class="form-group">
	                	<label for="title">Title</label>
	                	<input class="form-control" required name="title">
	                </div>
	                <div class="form-group">
	                	<label for="synopsis">Synopsis</label>
	                	<textarea class="form-control" rows="5" id="synopsis" name="synopsis"></textarea>
	                </div>
	                <div class="form-group">
	                	<label for="award">Awards</label>
	                	<textarea class="form-control" rows="5" id="award" name="award"></textarea>
	                </div>
	                <div class="form-group">
	                	<label for="yearfinish">Year</label>
	                	<input class="form-control" type="number" min="1900" max="2099" step="1" name="yearfinish" />
	                </div>
	                <div class="form-group">
	                	<label for="runningtime">Running Time</label>
	                	<input class="form-control" type="text" name="runningtime" />
	                </div>
	                <div class="form-group">
	                	<label for="youtube_url">Youtube URL</label>
	                	<input class="form-control" type="url" name="youtube_url" />
	                </div>
	                <div class="form-group">
	                	<label for="photo">Poster</label>
	                	<input class="form-control" type="file" name="photo" />
                    	<p style="color:red"><strong>Image size : 285 x 437</strong></p>
	                </div>

	                <div class="form-group">
	                	<label for="single_photo">Header Image</label>
	                	<input class="form-control" type="file" name="single_photo" />
	                	<p style="color:red"><strong>Image size : 1920 x 806</strong></p>
	                </div>
	                <div class="form-group">
	                	<label for="file_name">Film Still</label>
	                	<input class="form-control" type="file" multiple name="file_name[]" />
	                </div>

	                <div class="form-group">
	                	<label for="director">Director</label>
	                	<select class="form-control" required name="director" >
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

	                        {!! Form::checkbox( 'genre[]', "{$genre->id}", false) !!}
	                        {!! Form::label('genre', "{$genre->name}", ['class' => ['control-label','checkbox-inline']]) !!}
	                    </div>
	                    @endforeach
	                </div><br><br>

	                <div class="form-group">
	                    <h4><strong>Tags</strong></h4>
	                    @foreach ($tags as $tag)        

	                    <div class="col-md-3">

	                        {!! Form::checkbox( 'tag[]', "{$tag->id}", false) !!}
	                        {!! Form::label('tag', "{$tag->name}", ['class' => ['control-label','checkbox-inline']]) !!}
	                    </div>
	                    @endforeach
	                </div><br><br><br>

	                <div class="form-group">
	                    <h4><strong>Category</strong></h4>
	                    @foreach ($cats as $cat)        

	                    <div class="col-md-3">

	                        {!! Form::checkbox( 'cat[]', "{$cat->id}", false) !!}
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
</div>
@stop

@section('css')
    
@stop

@section('js')
	<script src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript">
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
    ]) !!}
	</script>
@stop