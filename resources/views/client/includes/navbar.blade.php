<header class="ht-header  ">
    {{-- <div class="container"> --}}
    <div class="">
        <nav class=" navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header logo">
                    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <div id="nav-icon1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                <a href="{{route('client-home')}}"><img class="logo" src="{{asset('/images/mfi-logo.png')}}" alt=""></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav flex-child-menu menu-left">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>

                        <!--HOME -->
                        <li class="">
                        <a href="{{route('client-home')}}" class="btn btn-default dropdown-toggle lv1">
                            Home
                            </a>
                        </li>

                        <!--FILMS -->
                        <li class="">
                            <a href="{{route('client-films')}}" class="btn btn-default dropdown-toggle lv1">
                                Films
                            </a>
                        </li>

                        <!--THE CREW -->
                        <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                MFI Alumni <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu multi-column columns-3 level1" id="members-nav">
                                        <div class="navlistdrop">
                                            <div class="col-50-perc">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="{{route('client-producers')}}?profession=actor">Actor</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=animator">Animator</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=assistant-director">Assistant Director</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=cinematographer">Cinematographer</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=director">Director</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=editor">Editor</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=graphic-designer">Graphic Designer</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=illustrator">Illustrator</a></li>
                                            
                                                </ul>
                                            </div>
                                            <div class="col-50-perc">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="{{route('client-producers')}}?profession=music">Music</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=photographer">Photographer</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=producer">Producer</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=production-designer">Production Designer</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=production-manager">Production Manager</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=sound">Sound</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=visual Artist">Visual Artist</a></li>
                                                    <li><a href="{{route('client-producers')}}?profession=writer">Writer</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </ul>
                                {{-- <ul class="dropdown-menu level1">
                                    <li class=""><a href="{{route('client-directors')}}">Directors</a></li>
                                        <li class="it-last"><a href="{{route('client-producers')}}">Producers</a></li>
                                            <li><a href="{{route('client-actors')}}">Cast</a></li>
                                </ul> --}}
                            </li>
                                

                        {{-- <li class="">
                            <a href="{{route('client-alumni-members')}}" class="btn btn-default dropdown-toggle lv1">
                                MFI Alumni Members
                            </a>
                        </li> --}}

                        <li class="">
                            <a href="{{route('client-catalog')}}" class="btn btn-default dropdown-toggle lv1">
                                MFI Catalog
                            </a>
                        </li>

                        <!--EVENTS -->
                        <li class="">
                        <a href="{{route('client_events')}}" class="btn btn-default dropdown-toggle lv1">
                                Events
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('client-workshops')}}" class="btn btn-default dropdown-toggle lv1">
                                Workshop
                            </a>
                        </li>

                        {{-- <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Events <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                            <li><a href="{{route('client-upcoming-events')}}">Upcoming Events</a></li>
                                <li class="it-last"><a href="{{route('client-past-events')}}">Past Events</a></li>
                            </ul>
                        </li> --}}
        
                        <li class="">
                            <a href="{{route('client-about-us')}}" class="btn btn-default dropdown-toggle lv1">
                                About Us
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('client-contact-us')}}" class="btn btn-default dropdown-toggle lv1">
                                Contact Us
                            </a>
                        </li>
                        


                        <!--EQUIPMENT -->
                        {{-- <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Equipment<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="{{route('client-cameras')}}">Cameras</a></li>
                                <li><a href="{{route('client-microphones')}}">Microphones</a></li>
                                <li class="{{route('client-props')}}"><a href="/props">Props</a></li>
                            </ul>
                        </li> --}}
                    </ul>

                    
                    {{-- <ul class="nav navbar-nav flex-child-menu menu-right">
                        <li class="loginLink"><a href="#">LOG In</a></li>
                        <li class="btn signupLink"><a href="#">sign up</a></li>
                    </ul> --}}
                </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <!-- top search form -->

        @if(Route::current()->getName()=='client-home')
        <form class="top-search" style="border: none" action="{{route('client-films')}}" role="search">
                        {{-- <select>
                            <option value="united">All</option>
                            <option value="united">Films</option>
                            <option value="united">Members</option>
                            <option value="united">Workshops</option>
                            <option value="united">Events</option>
                            <option value="saab">Others</option> 
                        </select> --}}
                        <input type="text" placeholder="Search for a film, alumni, workshops, or events that you are looking for">
                    
                    <button type="submit"><i class="fa fa-search"></i></button>
              
            {{-- <button type="submit"><i class="fa fa-search"></i></button> --}}
                </form>
        @endif

    </div>
</header>