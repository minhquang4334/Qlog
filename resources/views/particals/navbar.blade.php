{{--
<nav class="navbar navbar-expand-lg navbar-dark top-menu">
    <div class="container">
        <a class="navbar-brand text-black" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>


        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto fa-pull-right">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ lang('Articles') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('discussion') }}">{{ lang('Discussions') }}</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
        </div>
    </div>
</nav>--}}

<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-xs-2">
                    <div id="colorlib-logo"><a href="index.html">Article.</a></div>
                </div>
                <div class="col-md-10 col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="has-dropdown">
                            <a href="blog.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="#">Commercial</a></li>
                                <li><a href="#">Apartment</a></li>
                                <li><a href="#">House</a></li>
                                <li><a href="#">Building</a></li>
                            </ul>
                        </li>
                        <li><a href="lifestyle.html">Lifestyle</a></li>
                        <li><a href="travels.html">Travels</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="about.html">About Me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
