@extends('client.layouts.client_lo')
@section('title')
Home - MFI
@stop

@section('customcss')
.mv-img a img{
  {{-- height: 250px;
  width: auto; --}}
}
.latestnew{
  padding-top: 60px;
}
.blog-item-style-2 img {
  margin-bottom: 15px;
}
.blog-it-infor h3 {
  margin-bottom: 2px;
}
.time2:hover{
  color: #ffb427 !important;
}
.slick-multiItem .slick-initialized .slick-slider .slick-dotted :hover{
  cursor: -webkit-grab;
}
.left-col{
  padding-bottom: 5px !important;
  {{-- border-bottom: 1px solid #d26b26 !important; --}}
  border-bottom: 1px solid #279cd3 !important;
}
.movie-items .movie-item:hover{
  cursor: -webkit-grab;
}

/*trailers*/

.trailers .trailer-infor .desc {
  {{-- color: #ffb427 !important; --}}
  color: #279cd3 !important;
}
.trailers .trailer-infor p {
  color: #fff;
}
.trailers .videos .thumb-ft {
	background-color: #060606;
}
.trailers {
  background-color: #212121;
}
/*small dots on slider*/
.slick-dots li button:before{
  background-color: #ffffff00;
  {{-- border: 1px solid #d26b26; --}}
  border: 1px solid #279cd3;
}
.slick-dots li.slick-active button:before{
  {{-- background-color: #d26b26; --}}
  border: 1px solid #279cd3;
  background-color:#279cd3;
}
.slick-dots li button:hover:before, 
.slick-dots li button:focus:before{
  {{-- background-color: #f19f68; --}}
  border: 1px solid #d26b26;
  background-color: #d26b26;
}

/*fb and ig on slider*/

.slider .social-link > a span{
  display: block;
}
.slider .social-link > a{
  {{-- background-color: #d26b26; --}}
  background-color: #279cd3;
  padding: 7px 9px;
  border-radius: 50%;
  margin-left: 7px;
  color: white;
  {{-- border: 1px solid #d26b26; --}}
  border: 1px solid #279cd3;
}
.slider .social-link a > span {
  font-size: 15px;
}
.slider .social-link > a:hover
{
  background: none;
  color: #d26b26;
  {{-- color: #279cd3; --}}
  {{-- border: 1px solid #279cd3; --}}
  border: 1px solid #d26b26;  
  transition: 0.4s;
  transition-timing-function: ease-in-out;
}
.ytp-chrome-top-buttons {
  display: none;
}
header .top-search input{
  {{-- border: 2px solid #e06b26; --}}
  border: 1px solid #279cd3;
  background-color: #192c3a !important;
  margin-right: 5px;
  border-radius: 3px;
}
header .top-search input:focus{
  transition: 0.3s;
  border-color: #e06b26;
  background-color: #192c3a !important;
  color:white;
}
header .top-search button{
  {{-- background-color: #e06b26; --}}
  background-color: #279cd3;
  {{-- border: 1px solid #e06b26; --}}
  border: 1px solid #279cd3;
  {{-- color: white; --}}
  color: white;
  border-radius: 50%;
  padding: 5px 9px;
}

header .top-search button:hover{
  background-color: transparent;
  border: 1px solid #e06b26;
  {{-- border: 1px solid #279cd3; --}}
  color: #e06b26;
  {{-- color: #279cd3; --}}
  transition: 0.3s;
  transition-timing-function: ease-in-out;
}
header .top-search button:focus{
  outline:none;
}
header > .top-search > input::placeholder{
  color:gray;
}
.movie-items .movie-item .hvr-inner{
  {{-- background-color: #279cd3; --}}
}

.ytp-chrome-top-buttons {
  display: none;
}

@stop

@section('contents')



<!--SLIDER-->
<div class="slider movie-items" style="background-image: url('{{asset('images/home-bg.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="social-link">
        <p>Follow us: </p>
        <a href="#" class="btn btn-circle btn-warning"><span class="fa fa-facebook-official"></span></a>
        <a href="#" class="btn btn-circle btn-warning"><span class="fa fa-instagram"></span></a>
      </div>
      <div  class="slick-multiItemSlider">
        @foreach ($featuredfilms as $film)
          <div class="movie-item">
            <div class="mv-img">
              <a href="#"><img src="{{ asset($film->photo) }}" alt="" width="285" height="437"></a>
            </div>
            <div class="title-in">
              <div class="cate">
                @foreach ($film->genres as $genre)
                <span class="blue"><a href="#">{{$genre->name}}</a></span>
                @endforeach
              </div>
              <h6><a href="{{ route('client-films-show',['film'=>$film->slug]) }}">{{$film->title}}</a></h6>
              <p><span>({{$film->yearfinish}})</span></p>
            </div>
          </div>
        @endforeach
        </div>
    </div>
  </div>
</div>
<!--.end of SLIDER-->


<div class="movie-items">
  <div class="container">
    <div class="row ipad-width">
      <div class="col-md-9">
        <div class="title-hd left-col">
          <h2>Most Viewed</h2>
          <a href="{{ route('client-films') }}" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
        </div>
        <div class="tabs">
          {{-- <ul class="tab-links">
            <li class="active"><a href="#tab1">#Popular</a></li>
            <li><a href="#tab2"> #Coming soon</a></li>
            <li><a href="#tab3">  #Top rated  </a></li>
            <li><a href="#tab4"> #Most reviewed</a></li>                        
          </ul> --}}
          <div class="tab-content">
            <div id="tab1" class="tab active">
              <div class="row">
                
                <div class="slick-multiItem">
                  @foreach ($newestfilm as $film)
                  <div class="slide-it">
                    <div class="movie-item">
                      <div class="mv-img">
                        <img src="{{ asset($film->photo) }}" alt="" width="185" height="284">
                      </div>
                      <div class="hvr-inner">
                        <a  href="{{ route('client-films-show',['film'=>$film->slug]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                      </div>
                      <div class="title-in">
                        <h6><a href="{{ route('client-films-show',['film'=>$film->slug]) }}">{{$film->title}}</a></h6>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
              </div>
            </div>
        
          </div>
        </div>
        <div class="title-hd left-col">
          <h2>Featured Alumni</h2>
          {{-- <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a> --}}
        </div>
        <div class="tabs">
          {{-- <ul class="tab-links-2">
            <li><a href="#tab21">#Popular</a></li>
            <li class="active"><a href="#tab22"> #Coming soon</a></li>
            <li><a href="#tab23">  #Top rated  </a></li>
            <li><a href="#tab24"> #Most reviewed</a></li>                        
          </ul> --}}
          <div class="tab-content">
            <div id="tab1" class="tab active">
              <div class="row">
                
                <div class="slick-multiItem">
                  @foreach ($featuredalumni as $alumni)
                  <div class="slide-it">
                    <div class="movie-item">
                      <div class="mv-img">
                        <img src="{{asset($alumni->profilepic)}}" alt="" width="185" height="284">
                      </div>
                      <div class="hvr-inner">
                        <a  href="{{ route('client-member-show',['members'=>$alumni->slug]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                      </div>
                      <div class="title-in">
                        <h6><a href="{{ route('client-member-show',['members'=>$alumni->slug]) }}">{{$alumni->name}}</a></h6>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
              </div>
            </div>
        
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar">


          @if($todayevent !=null)
          <!--KAPAG MAY EVENT TODAY -->
          <div class="celebrities">
              {{-- <h4 class="sb-title"> --}}
                {{-- @if ($now === true) --}}
                {{-- Today's Event --}}
                {{-- @else --}}
                {{-- Upcoming Event --}}
                {{-- @endif --}}
              {{-- </h4> --}}

              
              <div class="title-hd">
                  <h3>
                    @if ($now === true)
                    Today's Event
                    @else
                    Upcoming Event
                    @endif
                  </h3>
                  <span>
                    <a href="{{ route('client-workshops') }}" class="pull-right time time2">
                      See Upcoming<i class="ion-ios-arrow-right"></i>
                    </a>
                  </span>
                </div>

              <div class="blog-item-style-2">
                {{-- @if($todayevent != null) --}}
                  <img src="{{asset($todayevent->eventimg)}}" alt="" style="width: 100%">
                  <div class="blog-it-infor">
                    
                    <h3><a href="{{ route('client-event-show',['event'=>$todayevent->slug]) }}">{{$todayevent->name}}</a></h3>
                    <span class="time">{{$todayevent->event_date}}</span>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, hic sapiente sit fugit dolorum eius, 
                      aliquam obcaecati.</p> --}}
                    
                  </div>
                  {{-- @endif --}}
  
                  <!--events
                {{-- <img src="{{asset('images/FB_AlumniGeneralAssembly.png')}}" alt="" style="width: 100%"> --}}
                  <div class="blog-it-infor">
                    
                    <h3><a href="#">MFI Alumni General Assembly</a></h3>
                    <span class="time">September 22, 2018</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Ea accusamus, est dignissimos dolor vero aliquam quo qui 
                      nobis minus natus ullam sequi consequatur 
                      quod necessitatibus iure repudiandae rem officia tenetur.</p>
                    
                  </div>
                -->

                </div>


          </div>
          @endif
          {{-- <div class="celebrities">
              <div class="morenew">
                  <h4 class="sb-title">Upcoming Events</h4>
                  <div class="more-it">
                      <h6><a href="#">Michael Shannon Frontrunner to play Cable in “Deadpool 2”</a></h6>
                      <span class="time">13 hours ago</span>
                  </div>
                </div>

          </div> --}}
          
          <!--end of MAY EVENT-->








          {{-- <div class="ads">
            <img src="images/uploads/ads1.png" alt="" width="336" height="296">
          </div> --}}
          {{-- <div id="tab31" class="tab celebrities">
            <div class="row">
              <h4 class="sb-title">Spotlight Celebrities</h4>
              <div class="blog-item-style-1">
                <img src="images/uploads/blog-it1.jpg" alt="" width="250" height="170">
                <div class="blog-it-infor">
                  <h3><a href="">Brie Larson to play first female white house candidate Victoria Woodull in Amazon film</a></h3>
                  <span class="time">13 hours ago</span>
                  <p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
                </div>
              </div>
            </div>
          </div> --}}
          @if ($workshop != null)
          <div class="celebrities">
              <div class="title-hd">
                  <h3>WORKSHOPS</h3>
                  <a href="{{ route('client-workshops') }}" class="time time2">View All<i class="ion-ios-arrow-right"></i></a>
                </div>
              {{-- <h4 class="sb-title">
                Workshop
              </h4>
              <a href="{{ route('client-workshops') }}" class="viewall">View all <i class="ion-ios-arrow-right"></i></a> --}}
              <div class="blog-item-style-2">
                  <img src="{{asset($workshop->workshopthumbnail)}}" alt="" style="width: 100%">
                  <div class="blog-it-infor">
                    <h3><a href="{{ route('client-workshop-show',['workshop'=>$workshop->slug]) }}">{{$workshop->name}}</a></h3>
                    <span class="time">{{$workshop->start_date}}</span>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem voluptates pariatur repellat quos asperiores qui dolorem, praesentium, 
                      dolore dignissimos odit quod labore quibusdam sit, eum et vitae aspernatur quidem perspiciatis!</p> --}}
                  </div>
                </div>
        {{-- <div class="celeb-item">
          <a href="#"><img src="images/uploads/ava2.jpg" alt="" width="70" height="70"></a>
          <div class="celeb-author">
            <h6><a href="#">Benjamin Carroll</a></h6>
            <span>Actor</span>
          </div>
        </div>
        <div class="celeb-item">
          <a href="#"><img src="images/uploads/ava3.jpg" alt="" width="70" height="70"></a>
          <div class="celeb-author">
            <h6><a href="#">Beverly Griffin</a></h6>
            <span>Actor</span>
          </div>
        </div>
        <div class="celeb-item">
          <a href="#"><img src="images/uploads/ava4.jpg" alt="" width="70" height="70"></a>
          <div class="celeb-author">
            <h6><a href="#">Justin Weaver</a></h6>
            <span>Actor</span>
          </div>
        </div> --}}
        {{-- <a href="#" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a> --}}
      </div>
      @endif
          {{-- <div class="celebrities">
            <h4 class="sb-title">
              @if ($now === true)
              Today's Event
              @else
              Upcoming Event
              @endif
            </h4>
            <div class="blog-item-style-2">
              @if($todayevent !=null)
                <img src="images/uploads/blog-detail.jpg" alt="" style="width: 100%">
                <div class="blog-it-infor">
                  
                  <h3><a href="{{ route('client-about-event') }}">{{$todayevent->name}}</a></h3>
                  <span class="time">{{$todayevent->created_at}}</span>
                  <p>{{$todayevent->description}}</p>
                  
                </div>
                @endif

                <!--events-->
              <img src="{{asset('images/FB_AlumniGeneralAssembly.png')}}" alt="" style="width: 100%">
                <div class="blog-it-infor">
                  
                  <h3><a href="#">MFI Alumni General Assembly</a></h3>
                  <span class="time">September 22, 2018</span>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Ea accusamus, est dignissimos dolor vero aliquam quo qui 
                    nobis minus natus ullam sequi consequatur 
                    quod necessitatibus iure repudiandae rem officia tenetur.</p>
                  
                </div>

              </div>
              
          </div> --}}
      </div>
    </div>
  </div>
</div>

<div class="trailers">
  <div class="container">
    <div class="row ipad-width">
      <div class="col-md-12">
        <div class="title-hd left-col">
          <h2>in theater</h2>
          <a href="{{ route('client-films') }}" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
        </div>
        <div class="videos">
           <div class="slider-for-2 video-ft">
            @foreach ($newestfilm as $film)
             <div>
              {{-- <iframe class="item-video" src="" data-src="{{$film->youtube_url}}?modestbranding=1&rel=0&html5=1&autoplay=1&showinfo=0" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation"></iframe> --}}
              

          <iframe width="100%" height="400" src="{{$film->youtube_url}}?modestbranding=1&amp;rel=0&amp;html5=1&amp;autoplay=1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
              {{-- <iframe width="100%" height="400" src="https://youtube.com/embed/ECwFoYlxdKo?mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" frameborder="0" allowfullscreen="allowfullscreen" __idm_frm__="606" __idm_id__="8697857"></iframe> --}}
            </div>
            @endforeach
            
            
          </div>
          <div class="slider-nav-2 thumb-ft">
          @foreach ($newestfilm as $film)
            <div class="item">
              <div class="trailer-img">
                <img src="{{ asset($film->photo) }}"  alt="photo by Barn Images" width="4096" height="2737">
              </div>
              <div class="trailer-infor">
                <h4 class="desc">{{$film->title}}</h4>
                <p>{{$film->runningtime}}</p>
              </div>
            </div>	
            @endforeach
            </div>
          
          </div>
        </div>   
      </div>
    </div>
  </div>
</div>
<!-- latest new v1 section-->
<div class="latestnew">
  <div class="container">
    <div class="row ipad-width">
      <div class="col-md-4">
        {{-- <div class="ads">
          <img src="images/uploads/blogv21.png" alt="" width="270" height="180">
        </div> --}}
        {{-- <div class="title-hd">
          <h2>Past Events</h2>
        </div>
        <div class="tabs">
          <ul class="tab-links-3">
            <li class="active"><a href="#tab31">#Movies </a></li>
            <li><a href="#tab32"> #TV Shows </a></li>              
            <li><a href="#tab33">  # Celebs</a></li>                       
          </ul> --}}
          {{-- <div class="tab-content">
            <div id="tab31" class="tab active">
              <div class="row">
                <div class="blog-item-style-1">
                    @if($upcomingevent != null)
                  <img src="{{asset('images/FB_AlumniGeneralAssembly.png')}}" alt="" style="width: 100%">
                  <div class="blog-it-infor">
                    <h3><a href="{{ route('client-about-event') }}">{{$upcomingevent->name}}</a></h3>
                    <span class="time">{{$upcomingevent->event_date}}</span>
                    <p>{{$upcomingevent->description}}</p>
                    
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <div id="tab32" class="tab">
               <div class="row">
                <div class="blog-item-style-1">
                  <img src="images/uploads/blog-it2.jpg" alt="" width="170" height="250">
                  <div class="blog-it-infor">
                    <h3><a href="#">Tab 2</a></h3>
                    <span class="time">13 hours ago</span>
                    <p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab33" class="tab">
              <div class="row">
                <div class="blog-item-style-1">
                  <img src="images/uploads/blog-it1.jpg" alt="" width="170" height="250">
                  <div class="blog-it-infor">
                    <h3><a href="#">Tab 3</a></h3>
                    <span class="time">13 hours ago</span>
                    <p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
                  </div>
                </div>
              </div>
                </div>
          </div> --}}
        {{-- </div> --}}
       {{-- @if(!$pastevents->isEmpty()) --}} 
        <div class="morenew">
          <div class="title-hd">
            <h3>Past Events</h3>
            <a href="{{ route('client_events') }}" class="viewall">See All Events<i class="ion-ios-arrow-right"></i></a>
          </div>
          <div class="more-items">
            <div class="left">
              @foreach ($pastevents as $event)
              <div class="more-it">
                <h6><a href="{{ route('client-event-show',['event'=>$event->slug]) }}">{{$event->name}}</a></h6>
                <span class="time">{{$event->event_date}}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
       {{-- @endif --}} 
      </div>
      <div class="col-md-4">
        <div class="sidebar">
          <div class="sb-facebook sb-it">
            <h4 class="sb-title">Find us on Facebook</h4>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMFIAlumni%2F&tabs=timeline&width=300&height=315&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="sidebar">
            <div class="sb-twitter sb-it">
                <h4 class="sb-title">Visit Us On Instagram</h4>
                {{-- <div class="slick-tw"> --}}
                  <div class="item" style="width: 300px; height: 315px; overflow: scroll">
                      <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/BmMzXiejgXE/?utm_source=ig_embed_loading" data-instgrm-version="12"style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/BmMzXiejgXE/?utm_source=ig_embed_loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div><div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BmMzXiejgXE/?utm_source=ig_embed_loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Mowelfund (@mowelfund)</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-08-08T01:48:58+00:00">Aug 7, 2018 at 6:48pm PDT</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script>                  {{-- <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/Bl-PWbsD0S8/?utm_source=ig_embed_loading" data-instgrm-version="12"style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/Bl-PWbsD0S8/?utm_source=ig_embed_loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div><div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div></a> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/Bl-PWbsD0S8/?utm_source=ig_embed_loading" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">&#34;Ibong Adarna&#34; is the first Filipino film ever to gross one million pesos in the Philippines. Learn more about Filipino films at www.mowelfund.com.</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by <a href="https://www.instagram.com/mowelfund/?utm_source=ig_embed_loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank"> Mowelfund</a> (@mowelfund) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-08-02T10:04:53+00:00">Aug 2, 2018 at 3:04am PDT</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script> --}}
                  </div>
                {{-- </div>					 --}}
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end of latest new v1 section-->

@stop


@section('customjs')
@stop