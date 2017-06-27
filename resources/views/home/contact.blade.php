@extends('layouts.home')
@section('info')
    <title>{{Config::get('web.web_name')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
@endsection

@section('content')

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('resources/views/home/img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="page-heading">
                        <h1 class = "quote" style="font: 400 72px 'Arizonia', Helvetice, sans-serif;
                        color:#f4645f;
                        text-align: center;">Contact Me</h1>
                        <hr class="small">
                        <span class="subheading">Have questions? I have answers (maybe).</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <h3 style="font: 22px 'Gloria Hallelujah', cursive;">Name: Jia Lu</h3>
                    <h3 style="font: 22px 'Gloria Hallelujah', cursive;">Phone:0211374930</h3>
                    <h3 style="font: 22px 'Gloria Hallelujah', cursive;">Email:346323821@qq.com</h3>
                <hr>
                <h3 style="font: 22px 'Gloria Hallelujah', cursive;">I'm right here</h3>
                <div id="map"></div>
                <script>
                    function initMap() {
                        var uluru = {lat:  -36.9094075, lng: 174.7180032};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 11,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script src="
				https://maps.googleapis.com/maps/api/js?key=AIzaSyARzSp_JwQN49B18TtBMhFvhC3tS5ATPgI&callback=initMap&language=en"></script>
            </div>
        </div>
    </div>

    <hr>

@endsection
