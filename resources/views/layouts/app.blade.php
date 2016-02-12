<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ServiceAC</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
   {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}} 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}

    {{-- <link href="{{ asset('plugins/datatables/media/css/jquery.dataTables.css') }}" rel="stylesheet"> --}}
     <link href="{{ asset('plugins/datatables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

     <link href="{{ asset('plugins/AdminGDP/css/AdminGDP.css') }}" rel="stylesheet">
     <link href="{{ asset('plugins/AdminGDP/css/themeGDP.css') }}" rel="stylesheet">

     <link href="{{ asset('css/canvasCrop.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">

    <div id="menu-toggle"><h2><i class="glyphicon glyphicon-menu-hamburger"></i></h2></div>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       AdminGDP
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-home"></i>Home</a></li> -->

                        @if (Auth::guest())
                            
                        @else
                            
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope"></i><span class="label label-warning">2</span></a>
                                  <ul class="dropdown-menu dropdown-menu-navcostum message">

                                    <li><a href=""><img src="img/user.jpg" alt="..." class="img-circle" height="30"><h4>Gugun Dwi Permana</h4><p>Hello, Saya mau tanya.</p></a></li>
                                    <li><a href=""><img src="img/user.jpg" alt="..." class="img-circle" height="30"><h4>Gugun Dwi Permana</h4><p>Hello, Kenapa saya lapar ya?</p></a></li>
                                    
                                  </ul>
                                </li>

                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" style="padding:10px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/user.jpg" alt="..." class="img-circle" height="30"> Gugun Dwi Permana <i class="fa fa-angle-down"></i></a>
                                  <ul class="dropdown-menu dropdown-menu-navcostum profile">
                                    <li class="box-profile"><img src="img/user.jpg" alt="..." class="img-circle" height="50"><h4>Gugun Dwi Permana</h4><p>Web Developer</p></li>

                                    
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Operation</li>
                                    
                                    <li>
                                        <a href="#"><i class="fa fa-user font-green"></i> My Profile</a> 
                                        <a href="{{ url('/logout') }}"><i class="fa fa-power-off font-red"></i> Logout</a>
                                    </li>
                                  </ul>
                                </li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                
                <div class="user-info">
                    <img src="img/user.jpg" alt="..." class="img-circle" height="100">
                </div>
                
                @if (Auth::guest())
                @else

                <li class="active"><a href="{{ url('/home') }}">Dashboard<i class="fa fa-btn fa-dashboard"></i></a></li>
                <li><a href="{{ url('/products') }}">Products<i class="fa fa-btn fa-cube"></i></a></li>
                <li><a href="{{ url('/services') }}">Services<i class="fa fa-btn fa-check-square"></i></a></li>
                <li><a href="{{ url('/abouts') }}">About Us<i class="fa fa-btn fa-at"></i></a></li>
                <li><a href="{{ url('/blogs') }}">Articles<i class="fa fa-btn fa-wordpress"></i></a></li>
                <li><a href="{{ url('/galleries') }}">Galleries<i class="fa fa-btn fa-image"></i></a></li>
                <li><a href="{{ url('/questions') }}">Questions<i class="fa fa-btn fa-question"></i></a></li>

                @endif
                <!-- 
                <li>
                    <a href="#" data-toggle="collapse" data-target="#sub-shortcuts"><i class="caret-left"><span class="fa fa-angle-down"></span></i>Shortcuts<i class="fa fa-reply"></i></a>
                </li>
                    <div class="collapse" id="sub-shortcuts">
                        <a href="#" class="list-group-item"><i class="fa fa-circle-o"></i> Shortcuts Images</a>
                        <a href="#" class="list-group-item"><i class="fa fa-circle-o"></i> Shortcuts Videos</a>
                        <a href="#" class="list-group-item"><i class="fa fa-circle-o"></i> Shortcuts Movies</a>
                        <a href="#" class="list-group-item"><i class="fa fa-circle-o"></i> Shortcuts Peoples</a>
                    </div>
                <li>
                    <a href="#"><i class="caret-left"><span class="label label-success">5</span></i>Events<i class="fa fa-calendar-check-o"></i></a>
                </li>
                              -->

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        
        <div class="container"><div class="box-alert" style="position:fixed; width:300px; top: 60px; left:50%; margin-left:-150px; z-index:1"></div></div>

        <div id="page-content-wrapper">

            @yield('content')

        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="{{ asset('/plugins/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/canvasCrop.js') }}"></script>

    <script src="{{ asset('/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>

    @yield('script')

    <script>
    $(document).ready(function() {
        $('#dataTable').dataTable();
        CKEDITOR.replace('description');
    });
    </script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
