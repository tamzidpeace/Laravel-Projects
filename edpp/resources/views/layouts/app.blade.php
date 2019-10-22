<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- testing --}}
    {{-- end of testing --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        E-Medi Care
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-option">
                        &nbsp;

                        <li><a href="/edpp/home">Home</a></li>
                        <li><a href="/edpp/hospitals">Hospital</a></li>
                        <li><a href="/edpp/doctors">Doctor</a></li>
                        <li><a href="/edpp/emergency">Emergency</a></li>
                        <li><a href="/edpp/donation">Donation</a></li>
                        <li><a href="/edpp/contact-report">Contact</a></li>

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    @if (Auth::user()->role_id == 1)
                                    <a href="/admin">Dashboard</a>

                                    @elseif(Auth::user()->role_id == 2)
                                    <a href="/hospital">Dashboard</a>

                                    @elseif(Auth::user()->role_id == 3)
                                    <a href="/doctor">Dashboard</a>
                                    <a href="#">User Profile</a>

                                    @elseif(Auth::user()->role_id == 4)
                                    <a href="/patient/appointments">Your Appointments</a>
                                    @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{-- flash message --}}

        @include('includes.flash')

        @yield('content')
    </div>
    {{-- footer --}}

    <footer class="section footer-classic context-dark bg-image" style="background: #454749;">
        <div class="container">
            <div class="row row-30">
                <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light"
                                src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37"
                                srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                        <h4 style="margin-top:-10px;">About</h4>
                        <p>Under Development Medical Project.</p>
                        <p>Developing By <strong>Arafat & Tajuddin</strong> With 💓</p>
                        <!-- Rights-->
                        <p class="rights"><span>©  </span><span
                                class="copyright-year">2019</span><span> </span><span>EDPP</span><span>. </span><span>No
                                Rights Reserved.</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Contacts</h4>
                    <dl class="contact-list">
                        <dt>Address:</dt>
                        <dd>Sylhet Engineering College</dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>Email:</dt>
                        <dd><a href="mailto:#">tamjedpeace@gmail.com</a></dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>Phones:</dt>
                        <dd><a href="tel:#">+880-1838201827</a> <span>or</span> <a href="tel:#">+880-1717000000</a>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4 col-xl-3">
                    <h4>Links</h4>
                    <ul class="nav-list">
                        <li style="margin-left:9px;"><a href="#">About</a></li>
                        <li style="margin-left:9px;"><a href="#">Projects</a></li>
                        <li style="margin-left:9px;"><a href="#">Blog</a></li>
                        <li style="margin-left:9px;"><a href="#">Contacts</a></li>
                        <li style="margin-left:9px;"><a href="#">Pricing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    {{-- end of footer --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- testing script --}}
    {{-- end of testing script --}}
</body>

</html>