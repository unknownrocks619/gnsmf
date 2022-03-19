<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gajendra Narayan Singh Memorial Foundation | Under Construction</title>
    <meta name="description" content="Gajendra Narayan Singh Memorial Foundation">
    <meta name="keywords" content="gnsmf, gajendra, narayan, gajendra narayan, gajendra foundation, gajendra memorial foundation">
    <meta name="author" content="Gajendra Narayan Singh Memorial Foundation">
    
    <!-- Mobile meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="HTML5 Template">
    
    <!-- Start Header styles -->
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/jquery.fullPage.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    <!-- End Header styles-->
    
    <!--Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
        
    <body></body>
    <!-- Start Loader -->
    <div class='loading'>
      <div class='loader'>
        <img height='80' src='images/loader.svg' width='80'>
      </div>
    </div>
    <!-- End Loader -->
    
    <!-- Start Header -->
    <header class='page-header' id='page-header'>
      <div class='container-full'>
        <div>
          <div class='navbar-header'>
            <!-- Logo -->
            <a class='logo animated onstart' data-animation-delay='200' data-animation='fadeInDown' href='#'>
              <!-- %img{:src => "images/logo.png", :alt => ""}/ -->
              <div class='circle-logo-wrapper'>
                <div class='circle'></div>
              </div>
              <strong>Gajendra Narayan Singh </strong> Memorial Foundation
            </a>
          </div>
          
          <!-- Social navigation -->
          
          <!-- End Social navigation -->
          
        </div>
      </div>
    </header>
    <!-- End Header -->

    
    <div class='page-wrap' id='fullpage'>
      @yield("content")
      
    </div>
    <!-- Start Footer -->
    <footer class='page-footer'>
      <div class='container-full'>
        <div class='row'>
          <div class='col-sm-12'>
            <div class='copyright'>© {{ date("Y") }} All rights reserved</div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->
    
    <!-- Start Scripts -->
    <script src="{{ asset ('js/jquery-3.2.1.min.js') }}"></script>
    
    <script src="{{ asset ('js/jquery.easing.1.3.js ')}}"></script>
    
    <!-- Bootsrap plugins -->
    <script src="{{ asset ('js/bootstrap.min.js') }}"></script>
    
    <!-- Countdown -->
    <script src="{{ asset ('js/jquery.countdown.js') }}"></script>
    
    <!-- Youtube player -->
    <script src="{{ asset ('js/jquery.mb.YTPlayer.js') }}"></script>
    
    <!-- Others -->
    <script src="{{ asset ('js/jquery.fullPage.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.appear.js') }}"></script>
    <script src="{{ asset ('js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset ('js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset ('js/owl.carousel.min.js') }}"></script>
    
    <!-- Mailchimp -->
    <script src="{{ asset ('js/jquery.ajaxchimp.js') }}"></script>
    
    <!-- Particles -->
    <script src="{{ asset ('js/particles.js') }}"></script>
    
    <!-- Moment -->
    <script src="{{ asset ('js/moment.js') }}"></script>
    <!-- Magnific popup -->
    <script src="{{ asset ('js/jquery.magnific') }}-popup.min.js"></script>
    
    <!-- Main -->
    <script src="{{ asset ('js/main.js') }}"></script>
    <!-- End Scripts -->
  </head>
</html>
