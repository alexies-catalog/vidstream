<!DOCTYPE html>
<html lang="en">
<head>
    @include('client/includes/header')
    <title>Document</title>
</head>
<body>
{{-- This is a sample page. --}}
{{-- @foreach($genres as $genre)
<p>This movie is {{ $genre->name }}</p>
@endforeach --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Please choose a genre:</h4>
            <hr />
            <div class="form-group">
                <label for="exampleFormControlSelect">Select Genre</label>
                <select class="form-control" id="exampleFormControlSelect1">
                     @foreach($genres as $genre)
                    <option value="{{$genre->id}}"> {{$genre->name}} </option>
                     @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
</body>
</html>