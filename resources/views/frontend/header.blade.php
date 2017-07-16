<!-- Header -->
            <div id="header">

                <div class="top">

                    <!-- Logo -->
                        <div id="logo">
                            <span class="image avatar48"><img src="{{ asset('dist/img/logoapplants.png') }}" alt="" /></span>
                            @if(Auth::check())
                            <a href="{{ url('/') }}"><h1 id="title">{{ config('app.name') }}</h1></a>
                            <p>@ {{ Auth::user()->username }}</p>
                            @else
                            <a href="{{ url('/') }}"><h1 id="title">{{ config('app.name') }}</h1></a>
                            <p>Happy Reading</p>
                            @endif
                        </div>

                    <!-- Nav -->
                        <nav id="nav">
                            <!--

                                Prologue's nav expects links in one of two formats:

                                1. Hash link (scrolls to a different section within the page)

                                   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

                                2. Standard link (sends the user to another page/site)

                                   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

                            -->
                            <ul>
                                <li><a href="{{ url('category/php') }}"><span class="icon fa-home">php</span></a></li>
                                <li><a href="{{ url('category/mysqli') }}"><span class="icon fa-th">MySQLi</span></a></li>
                                <li><a href="{{ url('category/laravel') }}"><span class="icon fa-user">Laravel</span></a></li>
                                <li><a href="{{ url('category/codeigniter') }}"><span class="icon fa-envelope">Codeigniter</span></a></li>
                            </ul>
                        </nav>

                </div>

                <div class="bottom">
                        <ul class="col-sm-12">
                        @if(!Auth::check())
                            <li><a href="{{ url('login') }}" class="btn btn-primary btn-flat col-xs-5" style="margin-right:20px">Sign In</a></li>
                            <li><a href="{{ url('register') }}" class="btn btn-danger btn-flat col-xs-5">Sign Up</a></li>
                        @else
                            <li><a href="{{ route('logout') }}" class="btn btn-default btn-flat col-xs-12" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                        @endif
                        </ul>
                    <!-- Social Icons -->
                        <ul class="icons">
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                            <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
                        </ul>

                </div>

            </div>