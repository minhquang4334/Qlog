<!DOCTYPE html>
<html lang="vi">
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
    {{--<link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
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

        <div class="main d-flex margin-bottom-80">
            <div class="col-md-7 col-sm-12 offset-md-1 margin-right20">
                @yield('content')
            </div>
            <div class="col-md-3 col-sm-12 right-content">
                @include('particals.rightnavbar')
            </div>
        </div>
            @include('particals.footer')
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
      if ('serviceWorker' in navigator && 'PushManager' in window) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
          });
        });
      }
    </script>
    <script>
      let didScroll;
      let lastScrollTop = 0;
      let delta = 5;
      let navbarHeight = $('#navBar').outerHeight();

      $(window).scroll(function(e) {
        didScroll = true;
      });

      setInterval(function() {
        if (didScroll) {
          hasScrolled();
          didScroll = false;
        }
      }, 100);

      function hasScrolled() {
        let st = $(window).scrollTop();
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

        //check if scroll to bottom
        let scrollHeight = $(document).height();
        let scrollPosition = $(window).height() + $(window).scrollTop();
        if (((scrollHeight - scrollPosition) >= 0) && ((scrollHeight - scrollPosition) <= 100)) {
          $('footer').css('bottom', '0');
        } else {
          $('footer').css('bottom', '-100px');
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
