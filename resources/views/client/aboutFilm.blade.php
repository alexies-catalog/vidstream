@extends('client.layouts.client_lo')
@section('title')
Film Title Here- MFI
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
    }
    .movie-single .movie-single-ct .movie-rate {
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

@stop

@section('contents')

<div class="buster-light">
    <div class="hero mv-single-hero" style="background-image: url('/images/film-landscape-sample.jpg'); background-position: center; background-size: cover; background-attachment: fixed;">
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
                    <div class="movie-img sticky-sb">
                        <img src="images/film-landscape-sample.jpg" alt="" style="max-width: 100%">
                        <div class="movie-btn"> 
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch</a></div>
                                <div><a href="/watch" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content" style="padding-top: 60px">
                        <h1 class="bd-hd">Tres Bravos <span class="yf">( 1993 )</span></h1>
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
                            </div>       --}}
                        {{-- </div> --}}
                        <div class="movie-rate">
                            <div class="rate">
                                {{-- <i class="ion-android-star"></i> --}}
                                {{-- <p><span>4.0</span> /5<br> --}}
                                    {{-- <span class="rv">56 Reviews</span> --}}
                                {{-- </p> --}}
                                {{-- <p class="views"><span class="fa fa-eye"></span>&nbsp;&nbsp;<span class="view-no">1,899,222</span></p> --}}
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
                                    <li><a href="#cast">The Crew </a></li>
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
                                                <p>Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth's mightiest heroes must come together once again to protect the world from global extinction.</p>
                                                <div class="title-hd-sm">
                                                    <h4>Awards</h4>
                                                </div>
                                                    <p>Best Comedy Film of 2017, Mowelfund Awards</p>
                                                <div class="title-hd-sm">
                                                    <h4>cast</h4>
                                                    {{-- <a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a> --}}
                                                </div>
                                                <!-- movie cast -->
                                                <div class="mvcast-item">                                           
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="images/director/thumbnail/2.jpg" class="small-pic" alt="">
                                                            <a href="#">James Spader</a>
                                                        </div>
                                                        <p>...  Ultron</p>
                                                    </div>
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                                <img src="images/director/thumbnail/3.jpg" class="small-pic" alt="">
                                                            <a href="#">Don Cheadle</a>
                                                        </div>
                                                        <p>...  James Rhodes/ War Machine</p>
                                                    </div>
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
                                                    <h6>Directed by: </h6>
                                                    <p><a href="#">Joss Whedon</a></p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Produced by: </h6>
                                                    <p><a href="#">Joss Whedon,</a> <a href="#">Stan Lee</a></p>
                                                </div>
                                                {{-- <div class="sb-it">
                                                    <h6>Stars: </h6>
                                                    <p><a href="#">Robert Downey Jr,</a> <a href="#">Chris Evans,</a> <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a></p>
                                                </div> --}}
                                                <div class="sb-it">
                                                    <h6>Genres:</h6>
                                                    <p><a href="#">Action, </a> <a href="#"> Sci-Fi,</a> <a href="#">Adventure</a></p>
                                                </div>
                                                <div class="sb-it">
                                                        <h6>Category:</h6>
                                                        <p><a href="#">Action, </a> <a href="#"> Sci-Fi,</a> <a href="#">Adventure</a></p>
                                                    </div>
                                                <div class="sb-it">
                                                    <h6>Year Finished:</h6>
                                                    <p>2015</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Run Time:</h6>
                                                    <p>141 min</p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Tags:</h6>
                                                    <p class="tags">
                                                        <span class="time"><a href="#">superhero</a></span>
                                                        <span class="time"><a href="#">marvel universe</a></span>
                                                        <span class="time"><a href="#">comic</a></span>
                                                        <span class="time"><a href="#">blockbuster</a></span>
                                                        <span class="time"><a href="#">final battle</a></span>
                                                    </p>
                                                </div>
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
                                                                    <img src="images/director/thumbnail/1.jpg" class="small-pic" alt="">
                                                                    <a href="#">Robert Downey Jr.</a>
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
                                                                    <img src="images/director/thumbnail/1.jpg" class="small-pic" alt="">
                                                                    <a href="#">Robert Downey Jr.</a>
                                                                </div>
                                                                {{-- <p>...  Producer</p> --}}
                                                            </div>
                                                        </div>  
            
                                                        <div class="title-hd-sm">
                                                            <h4>Others</h4>
                                                        </div>
                                                        <div class="mvcast-item">   
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <img src="images/director/thumbnail/2.jpg" class="small-pic" alt="">
                                                                        <a href="#">Robert Downey Jr.</a>
                                                                </div>
                                                                <p>...  Writer</p>
                                                            </div>                                      
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <img src="images/director/thumbnail/3.jpg" class="small-pic" alt="">
                                                                        <a href="#">Robert Downey Jr.</a>
                                                                </div>
                                                                <p>...  Photographer</p>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="title-hd-sm">
                                                            <h4>cast</h4>
                                                            {{-- <a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a> --}}
                                                        </div>
                                                        <!-- movie cast -->
                                                        <div class="mvcast-item">                                           
                                                            <div class="cast-it">
                                                                <div class="cast-left">
                                                                    <img src="images/director/thumbnail/5.jpg" class="small-pic" alt="">
                                                                        <a href="#">Robert Downey Jr.</a>
                                                                </div>
                                                                {{-- <p>...  Robert Downey Jr.</p> --}}
                                                            </div>
                                                        </div>
                                            </div>


                                            <!-- //== -->
                
                                        </div>
                                    </div>
                                       
                                        <div id="moviesrelated" class="tab">
                                            <div class="row">
                                                <h3>Related Films To</h3>
                                                <h2>Tres Bravos</h2>
                                                <div class="topbar-filter">
                                                <p class="text-center">Found <span>12 films</span> in total</p>
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
                                            <div class="movie-item-style-2">
                                                <img src="images/film-landscape-sample.jpg" alt="" style="max-width: 100%">
                                                <div class="mv-item-infor">
                                                    <h6><a href="#">oblivion <span>(2012)</span></a></h6>
                                                    {{-- <p class="rate"><i class="ion-android-star"></i><span>4.8</span> /5</p> --}}
                                                    <p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
                                                    <p class="run-time"> Run Time: 2h21’ .  <span>Year Finished: 1995</span></p>
                                                    <p>Director: <a href="#">Joss Whedon</a></p>
                                                    <p>Cast: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
                                                </div>
                                            </div>

                                            <hr />

                                            <!--Portait Poster-->
                                            <div class="movie-item-style-2">
                                                <img src="images/film/thumbnail/1.jpg" alt="" style="max-width: 100%">
                                                    <div class="mv-item-infor">
                                                        <h6><a href="#">oblivion <span>(2012)</span></a></h6>
                                                        {{-- <p class="rate"><i class="ion-android-star"></i><span>4.8</span> /5</p> --}}
                                                        <p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
                                                        <p class="run-time"> Run Time: 2h21’ .  <span>Year Finished: 1995</span></p>
                                                        <p>Director: <a href="#">Joss Whedon</a></p>
                                                        <p>Cast: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
                                                    </div>
                                            </div>
                                            
                                            <div class="topbar-filter">
                                                {{-- <label>Movies per page:</label>
                                                <select>
                                                    <option value="range">5 Movies</option>
                                                    <option value="saab">10 Movies</option>
                                                </select> --}}
                                                <div class="pagination2">
                                                    <span>Page 1 of 2:</span>
                                                    <a class="active" href="#">1</a>
                                                    <a href="#">2</a>
                                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
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
    </div>
</div>
@stop

@section('customjs')
@stop