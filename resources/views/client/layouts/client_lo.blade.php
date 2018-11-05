
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
  @include('client.includes.header')

  <title>
    @yield('title')
  </title>
  
  <style>
    @media only screen and (max-width: 991px){
      header .navbar-default img.logo {
        width: 70px !important;
        height:auto;
      }
      header{
        padding-bottom: 15px;
      }
    }
    .hero .hero-ct{
      padding-top:100px;
    }
    header .top-search{
      border:2px solid #e06b26;
      max-width: 768px;
      margin-right: auto; 
      margin-left: auto;
    }
    header .top-search input {
      transition: background-color 0.3s ease-out;
    }
    header .top-search input::placeholder{
      color: gray;
    }
    .topbar-filter .pagination2{
      margin-left: auto;
    }
    .small-pic{
      width: 40px;
    }

    header .navbar-default {
      margin-bottom: 3vw; 
    }
    #members-nav > div > div > ul > li a {
      display:block;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    #members-nav > div > div > ul > li a:hover {
      /* border-left: 5px solid orange; */
      border-left: 5px solid #dd5300;
    }

    /* #members-nav > div > div > ul.multi-column-dropdown {
      min-width: 60px;
    } */

    #members-nav{
      width: 430px;
    }

    .navlistdrop{
      display: flex;
    }

    .col-50-perc{
      width: 50%;
      padding: 0;
    }

    header .navbar-default .navbar-nav .dropdown .dropdown-menu.level1{
      padding-top:20px;
      padding-bottom: 10px;
    }

    .tabs ul.tabs-mv li.active a, .tabs ul.tabs-mv li:hover a {
    border-bottom: 2px solid #ffca00;
    }
   
    .redbtn, 
    .movie-items .movie-item .hvr-inner,
    .form-style-1 input.submit,
    .movie-item-style-1 .hvr-inner{
      background-color: #dd5900;
    }

    .buster-light .movie-single .movie-single-ct .mvcast-item .cast-it a:hover,
    .buster-light .movie-single p a:hover,
    .buster-light .movie-item-style-2:hover h6 a,
     {
      color: #dd5300 !important;
    }

    header .navbar-default, .sticky .navbar-default {
      padding-left: 10vw;
      padding-right: 10vw;
    }
    .top-search{
      margin-left: 10vw;
      margin-right: 10vw;
    }
    /* .header .top-search select{
      border-right: 1px solid #e06b26 !important;
    } */
    .common-hero:before {
      /* background-color: rgba(0, 0, 0, 0); */
      background-color: unset;
    }

    body > header > div > nav > div.navbar-header.logo > a > img{
      height:100px;
      -webkit-filter: drop-shadow(10px 10px 15px rgba(255, 255, 255, .8));

    }

    footer .ft-copyright {background-color: #1e6586;}

    footer .ft-copyright >p {color:  #e06b26;}
    
    footer > div.ft-copyright > div > p{color: black !important;}

     #back-to-top{
      background-color: black; 
      color: white; 
      opacity: 0.7; 
      /* border-radius: 50%;  */
      index: 1000; 
      line-height: 30px; 
      position: fixed; 
      bottom: 30px; right: 30px; padding: 10px 10px;
     }
     #back-to-top:hover{
       background-color:#dd5900;
       opacity: 0.9;
       margin-bottom: 5px;
     }
     .topbar-filter {
      /* border: 1px solid rgb(114,60,26); */
      border: 1px solid #279cd3;
      padding-left: 10px;
    }
    .topbar-filter select{
      /* border-right: 1px solid rgb(114,60,26);
      border-left: 1px solid rgb(114,60,26); */
      border-right: 1px solid #279cd3;
      border-left: 1px solid #279cd3;
      border-top: none; border-bottom: none;
    }
    .topbar-filter p span {
      /* color: rgb(210,107,38); */
      color: #279cd3;
    }
    .topbar-filter .active, .topbar-filter i:hover {
      color: #279cd3;
    /* color: #ffb427; */
    }
    div.topbar-filter>p, 
    .topbar-filter .pagination2 span,
    .topbar-filter .pagination2 a,
    .topbar-filter label{
      color: white;
    }
    @yield('customcss');

    .navbar-default {
        background-color: unset;
    }
    footer .ft-copyright > div > p{
        color: #fff;
    }
    .flex-child-ft > span{
        font-style: italic !important;
    }
    .common-hero {
        height: 250px;
    }
    .hero h1{
        /* color: #f7ac40; */
        /* color: #279cd3; */
        color: #03afff;
        font-family: 'OpenSans', sans-serif;
        font-weight: 600;
        clear: both;
        line-height: 1;
        font-size: 45px;
    }
    footer .ft-copyright{
      justify-content: center;
    }
    header .navbar-default .navbar-nav li a{
      color:white;
    }

    .sidebar .sb-search input,
    .form-style-1 input{
        border: 1px solid #279cd3;
        background-color: #192c3a !important;
        color:white;
    }
    .sidebar .sb-search input:focus,
    .form-style-1 input:focus{
        border: 1px solid #dd5900;
        transition: 0.3s;
    }
   
  </style>
  


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


<body>
  @include('client.includes.preloader')
  {{-- @include('client.includes.login_popup') --}}
  {{-- @include('client.includes.signup_popup') --}}
  @include('client.includes.navbar')
<div id="app">
    @yield('contents')
</div>


@include('client.includes.footer')

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/plugins2.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

@yield('customjs')
</body>
</html>