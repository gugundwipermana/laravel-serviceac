<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Service AC</title>
    <!-- Bootstrap 3.3.4 -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="" width="100"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="{{ url('/') }}"></a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#category">Layanan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#promo">Prinsip</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#footer">Footer</a>
                    </li> -->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/about') }}">ABOUT</a></li>
                    <li><a href="{{ url('/article') }}">ARTICLE</a></li>
                    <li><a href="{{ url('/service') }}">SERVICE</a></li>
                    <li><a href="{{ url('/gallery') }}">GALLERY</a></li>
                    <li><a href="{{ url('/contact') }}">CONTACT</a></li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    @yield('content')
    
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>

    <script src="{{ asset('js/site.js') }}"></script>

    <!-- GOOGLE MAPS -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
    function initialize() {

        var cord = new google.maps.LatLng({!! $setting->lat !!}, {!! $setting->long !!});

      var mapProp = {
        center:cord,
        zoom:14,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

      // Set map marker
      var marker = new google.maps.Marker({
            position: cord,
            map: map,
            title: 'My Location',
            animation:google.maps.Animation.BOUNCE
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script>
            $('.gall').click(function() {
                var id = $(this).attr('id');
                var imgSrc = document.getElementById(id).getAttribute('src');
                console.log(imgSrc);
                document.getElementById("gall-modal").setAttribute("src", imgSrc);
            });
    </script>
</body>
</html>