
@if(Route::current()->getName()=='client-home')
<div id="preloader" style="background-color:white; background-image: url('{{asset('images/home-bg-light.jpg')}}') !important;">
    {{-- <img class="logo" src="images/mfilogo.png" alt="" width="119" height="58"> --}}
    {{-- <div id="status"> --}}

        <img class="mt-auto mb-auto mr-auto ml-auto" src="{{asset('images/MFI-Logo.gif')}}" alt="" style="width: 10vw; margin-top: 30vh">
        {{-- <div id="status"> --}}
            <p style="color:black">Please wait ...</p>{{-- <span></span> --}}
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endif