@extends('client.layouts.client_lo')

@section('title')
{{$member->name}} - About
@stop

@section('customcss')
  .movie-single-ct{
    margin-top: 3vh;
  }
  .hero3 {
    height: 445px;
  }

  #app > div > div.page-single.movie-single.cebleb-single > div > div > div.col-md-8.col-sm-12.col-xs-12 > div > p{
    color:#ffffffb3;
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
.social-link a i{
  color: #1c75ae;
}
.social-link a i:hover{
  color: #ff8634;
}
@stop

@section('contents')

<div class="buster-light">
    <div class="hero hero3" style="background-image: url('{{asset($member->coverphoto)}}'); background-position: center; background-size: auto; background-attachment: fixed;">
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
    <div style="width: 300vw;height: 40px;background-color:white;position: absolute;margin-top: 20px;"></div>
    <!-- celebrity single section-->
    
    <div class="page-single movie-single cebleb-single">
      <div class="container">
        <div class="row ipad-width">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="mv-ceb">
              <img src="{{asset($member->profilepic)}}" alt="">
            </div>
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="movie-single-ct">
              <h1 class="bd-hd">{{$member->name}}</h1>
              <p class="ceb-single">
                @foreach ($member->professions as $prof)
                  
                  @if(!$loop->last)
                    {{$prof->name}}  |  
                  @endif
                  @if($loop->last)
                    {{$prof->name}}
                  @endif
                @endforeach
              </p>
              <div class="social-link cebsingle-socail">
                @if($member->fb_link != null)
                <a href="#"><i class="ion-social-facebook"></i></a>
                @endif
                @if($member->tw_link != null)
                <a href="#"><i class="ion-social-twitter"></i></a>
                @endif
                @if($member->ig_link != null)
                <a href="#"><i class="ion-social-googleplus"></i></a>
                @endif
                @if($member->li_link != null)
                <a href="#"><i class="ion-social-linkedin"></i></a>
                @endif
              </div>
              <div class="movie-tabs" style="">
                <div class="tabs">
                  <ul class="tab-links tabs-mv">
                    <li class="active"><a href="#overviewceb">Profile</a></li>
                    <li><a href="#filmography">filmography</a></li>
                    <li><a href="#mediaceb">See photos and videos</a></li> 
                                
                  </ul>
                  <div class="tab-content">
                    <div id="overviewceb" class="tab active">
                      <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          <p>{{str_limit($member->about, 1000)}}</p>
                          {{-- <p class="time"><a href="#">See full bio <i class="ion-ios-arrow-right"></i></a></p> --}}
                          <div class="title-hd-sm">
                            <h4>Videos & Photos</h4>
                            {{-- <a href="#" class="time">All 5 Videos & 245 Photos <i class="ion-ios-arrow-right"></i></a> --}}
                          </div>
                          {{-- <div class="mvsingle-item ov-item">
                            <a class="img-lightbox"  data-fancybox-group="gallery" href="{{asset('images/uploads/image11.jpg')}}" ><img src="{{asset('images/uploads/image1.jpg')}}" alt=""></a>
                            <a class="img-lightbox"  data-fancybox-group="gallery" href="{{asset('images/uploads/image21.jpg')}}" ><img src="{{asset('images/uploads/image2.jpg')}}" alt=""></a>
                            <a class="img-lightbox"  data-fancybox-group="gallery" href="{{asset('images/uploads/image31.jpg')}}" ><img src="{{asset('images/uploads/image3.jpg')}}" alt=""></a>
                            <div class="vd-it">
                              <img class="vd-img" src="{{asset('images/uploads/image4.jpg')}}" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="{{asset('images/uploads/play-vd.png')}}" alt=""></a>
                            </div>
                          </div> --}}
                          <div class="mvsingle-item ov-item">
                            @php $count = 0; @endphp
                            @foreach ($member->ufilms as $film)
                              @foreach ($film->stills as $still)
                                @php $count++; @endphp
                                @if ($count>4)
                                  @break
                                @endif
                                <a class="img-lightbox"  data-fancybox-group="gallery" href="{{asset($still->file_name)}}" ><img style="height:100px;width:100px;" src="{{asset($still->file_name)}}" alt=""></a>
                              @endforeach
                            @endforeach
                          </div>
                          <div class="title-hd-sm">
                            <h4>filmography</h4>
                            {{-- <a href="#" class="time">Full Filmography<i class="ion-ios-arrow-right"></i></a> --}}
                          </div>
                          <!-- movie cast -->
                          <div class="mvcast-item">	
                          @foreach ($member->ufilms as $i=>$film)	
                            @if($i == 4)
                              @break
                            @endif									
                            <div class="cast-it">
                              <div class="cast-left cebleb-film">
                                <img class="small-pic" src="{{($film->photo)}}" alt="">
                                <div>
                                  <a href="{{ route('client-films-show',['film'=>$film->slug]) }}">{{$film->title}} </a>
                                </div>
                                
                              </div>
                              <p>...  {{$film->yearfinish}}</p>
                            </div>
                          @endforeach
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                          <div class="sb-it">
                            <h6>Fullname:  </h6>
                            <p><a>{{$member->name}}</a></p>
                          </div>
                          <div class="sb-it">
                            <h6>Date of Birth: </h6>
                            <p>June 24, 1982</p>
                          </div>
                          <div class="sb-it">
                            <h6>Country:  </h6>
                            <p>Australian</p>
                          </div>
                          <div class="sb-it">
                            <h6>Height:</h6>
                            <p>186 cm</p>
                          </div>
                          <div class="sb-it">
                            <h6>Keywords:</h6>
                            <p class="tags">
                              <span class="time"><a href="#">jackman</a></span>
                              <span class="time"><a href="#">wolverine</a></span>
                              <span class="time"><a href="#">logan</a></span>
                              <span class="time"><a href="#">blockbuster</a></span>
                              <span class="time"><a href="#">final battle</a></span>
                            </p>
                          </div>
                          <div class="ads">
                            <img src="images/uploads/ads1.png" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="biography" class="tab">
                       <div class="row">
                        <div class="rv-hd">
                          <div>
                            <h3>Biography of</h3>
                              <h2>{{$member->name}}</h2>
                          </div>							            						
                        </div>
                        <p>{{$member->about}}</p>
                      </div>
                    </div>
                    <div id="mediaceb" class="tab">
                      <div class="row">
                        {{-- <div class="title-hd-sm">
                          <h4>Videos <span>(8)</span></h4>
                        </div>
                        <div class="mvsingle-item media-item">
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item1.jpg" alt="">
                              <a class="fancybox-media hvr-grow"  href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Trailer:  Watch New Scenes</a></h6>
                              <p class="time"> 1: 31</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item2.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Featurette: “Avengers Re-Assembled</a></h6>
                              <p class="time"> 1: 03</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item3.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Interview: Robert Downey Jr</a></h6>
                              <p class="time"> 3:27</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item4.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Interview: Scarlett Johansson</a></h6>
                              <p class="time"> 3:27</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item1.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Featurette: Meet Quicksilver & The Scarlet Witch</a></h6>
                              <p class="time"> 1: 31</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item2.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Interview: Director Joss Whedon</a></h6>
                              <p class="time"> 1: 03</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item3.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Interview: Mark Ruffalo</a></h6>
                              <p class="time"> 3:27</p>
                            </div>
                          </div>
                          <div class="vd-item">
                            <div class="vd-it">
                              <img class="vd-img" src="images/uploads/vd-item4.jpg" alt="">
                              <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                            </div>
                            <div class="vd-infor">
                              <h6> <a href="#">Official Trailer #2</a></h6>
                              <p class="time"> 3:27</p>
                            </div>
                          </div>
                        </div> --}}
                        <div class="title-hd-sm">
                          <h4>Photos <span></span></h4>
                        </div>
                        <div class="mvsingle-item">
                          @foreach ($member->ufilms as $film)
                            @foreach ($film->stills as $still)
                              <a class="img-lightbox"  data-fancybox-group="gallery" href="{{asset($still->file_name)}}" ><img style="height:100px;width:100px;" src="{{asset($still->file_name)}}" alt=""></a>
                            @endforeach
                          @endforeach
                        </div>
                      </div>
                      </div>
                      <div id="filmography" class="tab">
                      <app-single-member-films></app-single-member-films>
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
    <!-- celebrity single section-->
    
</div>

@stop

@section('customjs')
@stop
