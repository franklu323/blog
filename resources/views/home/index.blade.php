@extends('layouts.home')
@section('info')
    <title>{{Config::get('web.web_name')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
@endsection

@section('content')

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('resources/views/home/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading">
                        <h1 class = "quote" style="font: 400 72px 'Arizonia', Helvetice, sans-serif;
                        color:#f4645f;
                        text-align: center;">{{Config::get('web.web_name')}}</h1>
                        <span class="subheading">{{Config::get('web.keywords')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                @foreach($data as $d)
                <div class="post-preview">
                    <a href="{{url('art/'.$d->art_id)}}">
                        <h2 class="post-title">
                            {{$d->art_title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$d->art_description}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by {{$d->art_editor}} at {{date('Y/m/d',$d->art_time)}}</p>
                </div>
                <hr>
                @endforeach
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-secondary float-right" href="{{url('/blog')}}">Read More &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <hr>

@endsection
