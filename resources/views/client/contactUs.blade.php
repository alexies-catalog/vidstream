@extends('client.layouts.client_lo')
@section('title')
  Contact Us - MFI
@stop

@section('customcss')

  {{-- #app > div.hero.common-hero{
    display:none;
  } --}}
  header .navbar-default, .sticky .navbar-default {
    margin-top: 0px;
  }
  #mfi-page-title {
    color: #e06b26;
    color: e06b26;
  }

  #mfi-page-title {
    margin-top: 5vw;
  }

  .blog-detail-ct .comment-form form input, 
  .blog-detail-ct .comment-form form textarea{
    border: 1px solid #279cd3;
    background-color: #0b1319 !important;
  }
  .blog-detail-ct .comment-form form textarea:focus,
  .blog-detail-ct .comment-form form textarea:hover,
  .blog-detail-ct .comment-form form input:focus,
  .blog-detail-ct .comment-form form input:hover{
    {{-- background-color: 1px solid #e06b26; --}}
    border: 1px solid #e06b26;
  }
  .blog-detail-ct .comment-form form input.submit{
    background-color: #279cd3 !important;
    border:none;
  }
  .blog-detail-ct .comment-form form input.submit:hover{
    background-color: #e06b26 !important;
    transition: 0.4s;
    transition-timing-function: ease-in-out;
  }
  .abt-icon {
    color: #279cd3;
    font-size: 20px;
  }
  .social-link > a span{
    display: block;
  }
  .social-link > a{
    {{-- background-color: #d26b26; --}}
    background-color: #279cd3;
    padding: 7px 9px;
    border-radius: 50%;
    margin-left: 7px;
    color: white;
    {{-- border: 1px solid #d26b26; --}}
    border: 1px solid #279cd3;
  }
  .social-link a > span {
    font-size: 15px;
  }
  .social-link > a:hover
  {
    background: none;
    color: #d26b26;
    {{-- color: #279cd3; --}}
    {{-- border: 1px solid #279cd3; --}}
    border: 1px solid #d26b26;  
    transition: 0.4s;
    transition-timing-function: ease-in-out;
  }
@stop

@section('contents')

<div class="hero common-hero" style="background-image: url('{{asset('images/home-bg.jpg')}}') !important;">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="hero-ct">
      <h1><!--<span class="fa fa-envelope-o"></span>&nbsp;&nbsp;-->Contact Us</h1>
      {{-- <ul class="breadcumb">
      <li class="active"><a href="#">Home</a></li>
      <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
      </ul> --}}
    </div>
    </div>
  </div>
  </div>
</div>
<div class="page-single">
  <div class="container">
  <div class="row ipad-width">
    {{-- <center><h1 id="mfi-page-title">CONTACT US</h1></center><br><br> --}}
    <div class="col-md-6">
      <div class="blog-detail-ct">
        
      @if(Session::has('success'))    
          <script>
            swal("Message Sent", "{{ Session::get('success') }}");
          </script>
       @endif
          
       <div class="comment-form">
          <h4>Message Us</h4>
        {!! Form::open(['route'=>'contactus.store']) !!}
  
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
          
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
          
        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
        {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
        <span class="text-danger">{{ $errors->first('message') }}</span>
        </div>
          
        <div class="form-group">

        <input class="submit" type="submit" >
        </div>
          
        {!! Form::close() !!}
      </div>

      
      </div>
    </div>
    <div class="col-md-6">
      <div class="blog-detail-ct">
        <div class="comment-form">
        {{-- <h1>New Character Posters For Pirates Of The Caribbean</h1>
        <span class="time">27 Mar 2017</span>
        <img src="images/uploads/blog-detail.jpg" alt=""> --}}
        <h4>Why MFI?</h4>
        <p>Since its inception in 1979, MFI is proud of its dedication to film education, its willingness to innovate, and its passion for film, not only as a medium of entertainment, but as a very powerful visual and communication art form always in evaluation.
        </p>
        <p>Mowelfund Film Institute is a unique film training center in Southeast Asia that caters to the needs of the mainstream film industry and independent cinema.
        </p>
        <p>MFI's core function - Training in filmmaking is. MFI is popular for its short-term yet comprehensive hands-on film production workshops.
        </p>
        <h4>Mowelfund Film Institute</h4>
        <p><span class="fa fa-map-marker abt-icon"></span>&nbsp;&nbsp;No. 66, Rosario Drive, Lungsod Quezon, Kalakhang Maynila</p>
        <p><span class="fa fa-phone-square abt-icon"></span>&nbsp;&nbsp;(02) 727 1915</p>
        <p><span class="fa fa-envelope-o abt-icon"></span>&nbsp;&nbsp;ind.dev@mowelfund.com</p>
        
        <div class="flex-it share-tag">
          <div class="social-link pull-right">
              <h4>Follow Us</h4>
              <a target="_blank" href="#"><span class="fa fa-facebook-official"></span></a>
              {{-- <a target="_blank" href="{{ $appearance->tw_link }}"><i class="ion-social-twitter"></i></a> --}}
              <a target="_blank" href="#"><span class="fa fa-instagram"></span></a>
              {{-- <a target="_blank" href="{{ $appearance->gmail_link }}"><i class="ion-social-googleplus"></i></a> --}}
              {{-- <a href="#"><i class="ion-social-pinterest"></i></a>
              <a href="#"><i class="ion-social-linkedin"></i></a> --}}
          </div>
          {{-- <div class="right-it">
              <h4>Tags</h4>
              <a href="#">Gray,</a>
              <a href="#">Film,</a>
              <a href="#">Poster</a>
          </div> --}}
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



 
