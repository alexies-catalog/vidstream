@extends('client.layouts.client_lo')
@section('title')
Workshop - MFI
@stop

@section('customcss')
.topbar-filter .list {
    border-right: none;
}
p.pad-change{
    padding-right:9px;
}
@stop

@section('contents')
<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1><span class=""></span> WORKSHOP</h1>
                        {{-- <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> blog listing</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog list section-->
    <div class="page-single">
        <div class="container">
            {{-- <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="sidebar">
                                <div class="sb-search sb-it">
                                    <h4 class="sb-title">Search</h4>
                                    <input type="text" placeholder="Enter keywords">
                                </div>
                                 <div class="sb-cate sb-it">
                                    <h4 class="sb-title">Categories</h4>
                                    <ul>
                                        <li><a href="#">Awards (50)</a></li>
                                        <li><a href="#">Box office (38)</a></li>
                                        <li><a href="#">Film reviews (72)</a></li>
                                        <li><a href="#">News (45)</a></li>
                                        <li><a href="#">Global (06)</a></li>
                                    </ul>
                                </div>
                                <div class="sb-recentpost sb-it">
                                    <h4 class="sb-title">most popular</h4>
                                    <div class="recent-item">
                                        <span>01</span><h6><a href="#">Korea Box Office: Beauty and the Beast Wins Fourth</a></h6>
                                    </div>
                                    <div class="recent-item">
                                        <span>02</span><h6><a href="#">Homeland Finale Includes Shocking Death </a></h6>
                                    </div>
                                    <div class="recent-item">
                                        <span>03</span><h6><a href="#">Fate of the Furious Reviews What the Critics Saying</a></h6>
                                    </div>
                                </div>
                                <div class="sb-tags sb-it">
                                    <h4 class="sb-title">tags</h4>
                                    <ul class="tag-items">
                                        <li><a href="#">Batman</a></li>
                                        <li><a href="#">film</a></li>
                                        <li><a href="#">homeland</a></li>
                                        <li><a href="#">Fast & Furious</a></li>
                                        <li><a href="#">Dead Walker</a></li>
                                        <li><a href="#">King</a></li>
                                        <li><a href="#">Beauty</a></li>
                                    </ul>
                                </div>
                                <div class="ads">
                                    <img src="images/uploads/ads1.png" alt="">
                                </div>
                            </div>
                        </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="topbar-filter">
                                <p class="pad-change">Found <span>6 - 18</span> of <span>100</span></p>
                                <label>Filter by:</label>
                                <select v-model="sortKey" >
                                    <option value="views_asc" selected>All Workshops</option>
                                    <option value="views_desc">Upcoming Workshops</option>
                                    <option value="views_asc">Past Workshops</option>

                                </select>
                                <label>Sort by:</label>
                                <select v-model="sortKey" >
                                    <option value="views_asc" selected>Alphabetical</option>
                                    <option value="views_desc">Date Increasing</option>
                                    <option value="views_asc">Date Decreasing</option>

                                </select>
                                <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
                        </div>

                    <div class="blog-item-style-1 blog-item-style-3">
                        <img src="images/uploads/bloglist-it1.jpg" alt="">
                        <div class="blog-it-infor">
                            <h3><a href="blogdetail.html">Godzilla: King Of The Monsters Adds O’Shea Jackson Jr</a></h3>
                            <span class="time">27 Mar 2017</span>
                            <p>Africa's burgeoning animation scene got a boost this week with the announcement of an ambitious new partnership that will pair rising talents from across the continent ...</p>
                        </div>
                    </div>
        
                    <div class="blog-item-style-1 blog-item-style-3">
                        <img src="images/uploads/bloglist-it3.jpg" alt="">
                        <div class="blog-it-infor">
                            <h3><a href="blogdetail.html">‘Going in Style’ Tops ‘Smurfs: The Lost Village’ at Thursday Box Office</a></h3>
                            <span class="time">27 Mar 2017</span>
                            <p>New Line’s remake of “Going in Style” launched with a moderate $600,000 on Thursday night, while Sony’s animated “Smurfs: The Lost Village” debuted with $375,000 ...</p>
                        </div>
                    </div>
                                    <div class="blog-item-style-1 blog-item-style-3">
                        <img src="images/uploads/bloglist-it6.jpg" alt="">
                        <div class="blog-it-infor">
                            <h3><a href="blogdetail.html">Film Review: ‘Aftermath’</a></h3>
                            <span class="time">27 Mar 2017</span>
                            <p>"Aftermath" is a plane crash movie without a plane crash. Instead, the closest we get is a scene set in the control tower, where a computer screen shows two ...</p>
                        </div>
                    </div>
                    <ul class="pagination">
                        <li class="icon-prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">21</a></li>
                        <li><a href="#">22</a></li>
                        <li class="icon-next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
                    </ul>
                </div>
                
            </div>  --}}
            <app-workshop-component></app-workshop-component>
        </div>
    </div>
    <!--end of blog list section-->
@stop

@section('customjs')

@stop

