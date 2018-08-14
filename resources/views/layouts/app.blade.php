    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">

    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/home.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/' . config('blog.color_theme') . '.css') }}">

    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('styles')
    @yield('css')
</head>
<body>
    <div class="colorlib-loader"></div>
    <div id="app">
        @include('particals.navbar')

        <div class="main">
            @yield('content')
        </div>

        {{--@include('particals.footer')--}}
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="/js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/postscribe.min.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/highlight.js/latest/highlight.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/latest/styles/github.min.css">--}}
    <!-- Magnific Popup -->
    <script src="{{ mix('js/home.js') }}"></script>
    <script src="{{ mix('js/main.js') }}"></script>
    @yield('scripts')
    @yield('styles')
    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });

    </script>

    <script>
      var didScroll;
      var lastScrollTop = 0;
      var delta = 5;
      var navbarHeight = $('#navBar').outerHeight();
      $('#app').scroll(function(event){
        didScroll = true;
      });
      setInterval(function() {
        if (didScroll) {
          hasScrolled();
          didScroll = false;
        }
      }, 250);

      function hasScrolled() {
        let st = $('#app').scrollTop();
        console.log('st: ', st)
        console.log('navbarHeight: ', navbarHeight)
        console.log('lastScrollTop: ', lastScrollTop)
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
          return;
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
          // Scroll Down
          $('#navBar').css('top', '-100px')
        } else {
          // Scroll Up
          $('#navBar').css('top', '0')
        }

        lastScrollTop = st;
      }
    </script>

    @if(config('blog.google.open'))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
    @endif
</body>
</html>
