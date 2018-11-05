@extends('client.layouts.client_lo')
@section('title')
{{$film->title}} - MFI
@stop

@section('customcss')
.movie-single .movie-img .movie-btn, .movie-single .mv-ceb .movie-btn{
    background-color: transparent;
    border: none;
}
.movie-single .movie-img img{
    margin-top: 50px;
}

h1:first-child{
    margin-top: 50px;
    margin-bottom: 20px;
}

.rate-star > p > span.views {
    font-weight: bold;
}

.movie-single .movie-single-ct .movie-rate{
    border: none;
}
.movie-single .movie-single-ct .mvcast-item .cast-it .cast-left{
    width:100%;
}
/*tablet and mobile*/
@media only screen and (max-width:991px){
    .sticky-sb{
        position: fixed;
        top: 0;
    }
    .tabs ul.tabs-mv li {
        display: inline-block;
    }
    .bd-hd {
        color: #424242;
        text-align: center;
    }
    span.yf, div.rate > p, div.rate > p > span {
        color: #4f5b68 !important;
    }
    .view, .rate{
        color: #424242;
        margin: 0 auto;
    }
    h1:first-child {
        margin-top: 35px;
        margin-bottom: 10px;
    }
    .movie-single .movie-single-ct .movie-rate {
        padding: 0 0;
        margin-bottom: 30px;
    }
}

@media only screen and (min-width:992px){
    span.yf, div.rate > p, div.rate > p > span {
        color: #ded9d1 !important;
    }
    div.rate-star > p {
        color: white !important;
    }
    .movie-single .movie-single-ct .movie-rate {
        margin-bottom: 100px;
    }
    movie-single-ct main-content{
        padding-top: 60px;
    }
}

.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: 100%;
    pointer-events:none;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
    pointer-events:none;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
 max-width:inherit; /* For Bootstrap 4 - to avoid the modal window stretching full width */
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
}
.mv-single-hero {
    height: 470px;
}
.buster-light .movie-single p a:hover,
.buster-light .movie-single .movie-single-ct .mvcast-item .cast-it a:hover,
.buster-light .movie-item-style-2:hover h6 a {
    color: #dd5900;
}

.buster-light .tabs ul.tabs-mv li.active a
{
    color: #279cd3;
}
.buster-light .tabs ul.tabs-mv li:hover a,
.movie-single .movie-single-ct .mvcast-item .cast-it a:hover,
.buster-light .movie-item-style-2 .mv-item-infor p a:hover{
    {{-- color: #ff8634; --}}
    color: #ff8634;
}

.tabs ul.tabs-mv li.active a:hover,
.tabs ul.tabs-mv li:hover a{
    border-bottom: 2px solid #ff8634;
    padding-bottom: 5px;
}
.tabs ul.tabs-mv li.active a {
    {{-- border-bottom: 2px solid #279cd3; --}}
    border-bottom: 2px solid #00bcd4;
}
.tabs ul.tabs-mv li:hover a{
    color: #ff8634;
}
.redbtn{
    background-color: #1c75ae;
}
.buster-light .title-hd-sm {
    border-color: #279cd3;
}
@stop

@section('contents')

<div class="buster-light">
    <div class="hero mv-single-hero" style="background-image: url('{{asset($film->single_photo)}}'); background-position: center; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h1> movie listing - list</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img">
                        <img src="{{ asset($film->photo) }}" alt="" style="max-width: 100%">
                        <div class="movie-btn">	
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch</a></div>
                                @if($film->youtube_url !=null)
                                <div><a href="" data-video="{{ $film->youtube_url }}" data-toggle="modal" data-target="#videoModal" class="video item item-2 redbtn hvr-grow"><i class="ion-play"></i></a></div>
                                @else
                                <div><a href="" class="item item-2 redbtn hvr-grow"><i class="ion-play"></i></a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content" style="padding-top: 60px">
                        <h1 class="bd-hd">{{$film->title}} <span class="yf">( {{$film->yearfinish}} )</span></h1>
                        {{-- <div class="social-btn"> --}}
                            {{-- <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a> --}}
                            {{-- <div class="hover-bnt">
                                {{-- <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a> --}}
                                {{-- <div class="hvr-item"> --}}
                                    {{-- <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                    <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                    <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                    <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a> --}}
                                {{-- </div>
                                <div style="height: 10px;"></div>
                            </div>		 --}}
                        {{-- </div> --}}
                        <div class="movie-rate">
                            <div class="rate">
                                {{-- <i class="ion-android-star"></i>
                                <p><span>4.0</span> /5<br> --}}
                                    {{-- <span class="rv">56 Reviews</span> --}}
                                {{-- </p>
                                <p class="views"><span class="fa fa-eye"></span>&nbsp;&nbsp;<span class="view-no">1,899,222</span></p> --}}
                            </div>
                            {{-- <div class="rate">
                                <p>&nbsp;&nbsp;<span class="views">1,899,222</span></p>
                            </div> --}}
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overview">Overview</a></li>
                                    {{-- <li><a href="#reviews"> Reviews</a></li> --}}
                                    <li><a href="#cast">Cast & Crew </a></li>
                                    <li><a href="#moviesrelated"> Related Films</a></li>                        
                                </ul>
                                <div class="tab-content">
                                    {{-- Overview --}}
                                    <div id="overview" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <div class="title-hd-sm">
                                                    <h4>Synopsis</h4>
                                                </div>
                                                <p>
                                                    @if($film->synopsis != null)
                                                        {{$film->synopsis}}
                                                    @else
                                                        No synopsis available.
                                                    @endif
                                                </p>
                                                @if($film->award != null)
                                                <div class="title-hd-sm">
                                                    <h4>Awards</h4>
                                                </div>
                                                    <p>{{$film->award}}</p>
                                                @endif
                                                @foreach ($film->members as $member)
                                                    @if($member->pivot->member_profession == 'Actor')
                                                        <div class="title-hd-sm">
                                                            <h4>cast</h4>
                                                        </div>
                                                        @break
                                                    @endif
                                                @endforeach
                                                <!-- movie cast -->
                                                <div class="mvcast-item">											
                                                    @foreach ($film->members as $member)
                                                        @if($member->pivot->member_profession == 'Actor')
                                                        <div class="cast-it">
                                                            <div class="cast-left">
                                                                <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                    <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                            </div>
                                                            <p>...  {{ $member->pivot->member_profession }}</p>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                    {{--<div class="cast-it">
                                                        <div class="cast-left">
                                                                <img src="images/director/thumbnail/3.jpg" class="small-pic" alt="">
                                                            <a href="#">Don Cheadle</a>
                                                        </div>
                                                        <p>...  James Rhodes/ War Machine</p>
                                                    </div>--}}
                                                </div>
                                                {{-- <div class="title-hd-sm">
                                                    <h4>User reviews</h4>
                                                    <a href="#" class="time">See All 56 Reviews <i class="ion-ios-arrow-right"></i></a>
                                                </div> --}}
                                                <!-- movie user review -->
                                                {{-- <div class="mv-user-review-item">
                                                    <h3>Best Marvel movie in my opinion</h3>
                                                    <div class="no-star">
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star last"></i>
                                                    </div>
                                                    <p class="time">
                                                        17 December 2016 by <a href="#"> hawaiipierson</a>
                                                    </p>
                                                    <p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
                                                </div> --}}
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Director: </h6>
                                                    <p>
                                                        @php $i=0 @endphp
                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession == 'Director')
                                                                @php $i++ @endphp
                                                                <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                            @endif
                                                        @endforeach
                                                        @if($i===0)
                                                        -
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Producer: </h6>
                                                    <p>
                                                        @php $i=0 @endphp
                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession == 'Producer')
                                                                @php $i++ @endphp
                                                                <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}&nbsp;</a>
                                                            @endif
                                                        @endforeach
                                                        @if($i===0)
                                                        -
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="sb-it">
                                                    @foreach ($film->members as $member)
                                                        @if($member->pivot->member_profession == 'Writer')
                                                            <h6>Writer: </h6>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <p>
                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession == 'Writer')
                                                                <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}&nbsp;</a>
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div>
                                                {{-- <div class="sb-it">
                                                    <h6>Stars: </h6>
                                                    <p><a href="#">Robert Downey Jr,</a> <a href="#">Chris Evans,</a> <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a></p>
                                                </div> --}}
                                                @if(count($film->genres) != 0)
                                                <div class="sb-it">
                                                    <h6>Genres:</h6>
                                                    <p>
                                                        @foreach ($film->genres as $genre)
                                                            <a href="#">{{ $genre->name }}&nbsp;</a>
                                                        @endforeach
                                                    </p>
                                                </div>
                                                @endif
                                                @if(count($film->categories) != 0)
                                                <div class="sb-it">
                                                    
                                                    <h6>Category:</h6>
                                                    
                                                    <p>
                                                        @foreach ($film->categories as $cat)
                                                            <a href="#">{{ $cat->name }}&nbsp;</a>
                                                        @endforeach
                                                    </p> 
                                                </div>
                                                @endif
                                                @if($film->yearfinish != null)                                                 
                                                <div class="sb-it">
                                                    <h6>Year Finished</h6>
                                                    <p>{{$film->yearfinish}}</p>
                                                </div>
                                                @endif
                                                @if($film->runningtime != null)
                                                <div class="sb-it">
                                                    <h6>Run Time:</h6>
                                                    <p>{{$film->runningtime}}</p>
                                                </div>
                                                @endif
                                                @if(count($film->tags) != 0)
                                                <div class="sb-it">
                                                    <h6>Tags:</h6>
                                                    <p class="tags">
                                                        @foreach ($film->tags as $tag)
                                                            <span class="time"><a href="#">{{ $tag->name }}</a></span>
                                                        @endforeach
                                                    </p>
                                                </div>
                                                @endif
                                                {{-- <div class="ads">
                                                    <img src="images/uploads/ads1.png" alt="">
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                
                                    {{-- The Crew --}}
                                    <div id="cast" class="tab">
                                        <div class="row">
                                            {{-- <h3>The Crew of</h3>
                                                <h2>Tres Bravos</h2> --}}
                                            <!-- //== -->
                                            <div class="col-md-6">
                                                    <div class="title-hd-sm">
                                                            <h4>Director</h4>
                                                        </div>
                                                        <div class="mvcast-item">	
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    @php $i=0 @endphp
                                                                    @foreach ($film->members as $member)
                                                                        @if($member->pivot->member_profession == 'Director')
                                                                        @php $i++ @endphp
                                                                            <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                            <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                    @if($i===0)
                                                                    -
                                                                    @endif
                                                                </div>
                                                                {{-- <p>...  Director</p> --}}
                                                            </div>
                                                        </div>	
            
                                                        <div class="title-hd-sm">
                                                            <h4>Producer</h4>
                                                        </div>
                                                        <div class="mvcast-item">	
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    @php $i=0 @endphp
                                                                    @foreach ($film->members as $member)
                                                                        @if($member->pivot->member_profession == 'Producer')
                                                                            @php $i++ @endphp
                                                                            <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                            <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                    @if($i===0)
                                                                    -
                                                                    @endif
                                                                </div>
                                                                {{-- <p>...  Producer</p> --}}
                                                            </div>
                                                        </div>	

                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession == 'Writer')
                                                                <div class="title-hd-sm">
                                                                    <h4>Writer</h4>
                                                                </div>
                                                                @break
                                                            @endif
                                                        @endforeach
                                                        <div class="mvcast-item">   
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    @foreach ($film->members as $member)
                                                                        @if($member->pivot->member_profession == 'Writer')
                                                                            <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                            <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                {{-- <p>...  Producer</p> --}}
                                                            </div>
                                                        </div>  
                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession != 'Actor' && $member->pivot->member_profession != 'Writer' && $member->pivot->member_profession != 'Producer' && $member->pivot->member_profession != 'Director')
                                                                <div class="title-hd-sm">
                                                                    <h4>Others</h4>
                                                                </div>
                                                                @break
                                                            @endif
                                                        @endforeach
                                                        <div class="mvcast-item">	
                                                            @foreach ($film->members as $member)
                                                                @if($member->pivot->member_profession != 'Actor' && $member->pivot->member_profession != 'Writer' && $member->pivot->member_profession != 'Producer' && $member->pivot->member_profession != 'Director')
                                                                <div class="cast-it">
                                                                    <div class="cast-left">
                                                                        <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                            <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                                    </div>
                                                                    <p>...  {{ $member->pivot->member_profession }}</p>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                    @foreach ($film->members as $member)
                                                        @if($member->pivot->member_profession == 'Actor')
                                                    <div class="title-hd-sm">
                                                            <h4>cast</h4>
                                                            {{-- <a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a> --}}
                                                        </div>
                                                        @break
                                                        @endif
                                                    @endforeach
                                                        <!-- movie cast -->
                                                        <div class="mvcast-item">
                                                            @foreach ($film->members as $member)
                                                                @if($member->pivot->member_profession == 'Actor')
                                                                <div class="cast-it">
                                                                    <div class="cast-left">
                                                                        <img src="{{asset($member->profilepic)}}" class="small-pic" alt="">
                                                                            <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                            </div>


                                            <!-- //== -->
                
                                        </div>
                                    </div>
                                       
                                        <div id="moviesrelated" class="tab">
                                            <div class="row">
                                                <h3>Related Films To</h3>
                                                <h2>{{$film->title}}</h2>
                                                <div class="topbar-filter">
                                                <p class="text-center">Found <span>@php echo count($relatedfilms) @endphp</span> in total</p>
                                                {{-- <label>Sort by:</label>
                                                <select>
                                                    <option value="popularity">Popularity Descending</option>
                                                    <option value="popularity">Popularity Ascending</option>
                                                    <option value="rating">Rating Descending</option>
                                                    <option value="rating">Rating Ascending</option>
                                                    <option value="date">Release date Descending</option>
                                                    <option value="date">Release date Ascending</option>
                                                </select> --}}
                                            </div>

                                            <!--Landscape Poster-->
                                            @foreach ($relatedfilms as $relatedfilm)
                                            <div class="movie-item-style-2">
                                                <img src="{{asset($relatedfilm->photo)}}" alt="" style="max-width: 100%">
                                                <div class="mv-item-infor">
                                                    <h6><a href="#">{{$relatedfilm->title}} <span>({{$relatedfilm->yearfinish}})</span></a></h6>
                                                    {{-- <p class="rate"><i class="ion-android-star"></i><span>4.8</span> /5</p> --}}
                                                    <p class="describe">{{ str_limit($relatedfilm->synopsis, 300) }}...</p>
                                                    <p class="run-time"> {{$relatedfilm->runningtime}}’ .  <span>Year Finished: {{$relatedfilm->yearfinish}}</span></p>
                                                    <p>Director: 
                                                        @foreach ($film->members as $member)
                                                            @if($member->pivot->member_profession == 'Director')
                                                                <a href="{{ route('client-member-show',['members'=>$member->slug]) }}">{{ $member->pivot->member_name }}</a>
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                    {{--<p>Cast: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>--}}
                                                </div>
                                            </div>
    
                                            <hr />
                                            @endforeach
                                            
                                            {{--<div class="topbar-filter">
                                                 <label>Movies per page:</label>
                                                <select>
                                                    <option value="range">5 Movies</option>
                                                    <option value="saab">10 Movies</option>
                                                </select> 
                                                <div class="pagination2">
                                                    <span>Page 1 of 2:</span>
                                                    <a class="active" href="#">1</a>
                                                    <a href="#">2</a>
                                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
                                                </div>
                                            </div>--}}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center modal-lg" style="max-width:800px;">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <iframe width="100%" height="400" src="" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
    </div>
  </div>
@stop

@section('customjs')
<script>
  $(function() {
    $(".video").click(function (e) {
        e.preventDefault()
      var theModal = $(this).data("target"),
      videoSRC = $(this).attr("data-video"),
      videoSRCauto = videoSRC + "?modestbranding=1&rel=0&html5=1&autoplay=1";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal + ' button.close').click(function () {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
    });
  });

$('#videoModal').on('hidden.bs.modal', function (e) {
    $('#videoModal').find('iframe').attr('src', '');
});
</script>
@stop