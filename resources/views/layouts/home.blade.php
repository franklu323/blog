<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('info')
<!-- Bootstrap Core CSS -->
    <link href="{{asset('resources/views/home/lib/bootstrap/xx/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional fonts for this theme -->
    <link href="{{asset('/resources/views/home/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<link rel="icon" href="{{asset('/resources/views/home/img/logo.png')}}" type="image/x-icon">
	

    <!-- Custom styles for this theme -->
    <link href="{{asset('resources/views/home/css/clean-blog.min.css')}}" rel="stylesheet">
	
	<!-- jQuery Version 3.1.1 -->
	<script src="{{asset('resources/views/home/lib/jquery/jquery.js')}}"></script>


	<!-- Tether -->
	<script src="{{asset('resources/views/home/lib/tether/tether.min.js')}}"></script>
	
	<!-- Custom styles for this theme -->
    <link href="{{asset('resources/views/home/css/clean-blog.min.css')}}" rel="stylesheet">
	
	<!-- jQuery Version 3.1.1 -->
	<script src="{{asset('resources/views/home/lib/jquery/jquery.js')}}"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="{{asset('resources/views/home/lib/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Theme JavaScript -->
	<script src="{{asset('resources/views/home/js/clean-blog.min.js')}}"></script>

	<!-- Tether -->
	<script src="{{asset('resources/views/home/lib/tether/tether.min.js')}}"></script>





</head>

<body>

<header>
    <!-- Temporary navbar container fix until Bootstrap 4 is patched -->
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav > .container {
                width: 100%;
            }
        }
    </style>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <div class="container">

            <a class="navbar-left" href="{{url('/')}}">
                <img class="img-responsive center-block" style="max-width:100px;" src="{{asset('/resources/views/home/img/logo.png')}}">
            </a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/contact')}}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@section('content')

@show
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/frank.lv323/"  target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/jia.lu.521" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
					<li class="list-inline-item">
                        <a href="https://github.com/franklu323" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
					<li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/frank323/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="http://weibo.com/franklv323" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-weibo fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p style="color: #e13a47; text-align: center">{!! Config::get('web.copyright') !!}</p>
            </div>
        </div>
    </div>
</footer>

</body>

</html>
