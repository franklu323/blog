@extends('layouts.home')
@section('info')
    <title>{{$field->art_title}}-{{Config::get('web.web_name')}}</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />
@endsection

@section('content')

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('{{asset('resources/views/home/img/art_img.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading">
                        <h1>{{$field->art_title}}</h1>
                        <h2 class="subheading">{{$field->art_description}}</h2>
                        <span class="meta">Posted by {{$field->art_editor}} at {{date('Y/m/d',$field->art_time)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <ul class="infos">
                        {!! $field->art_content !!}
                    </ul>
                    <hr>
                    <div class="ad"> </div>
                    <div class="nextinfo">
                        <p>last article:
                            @if($article['pre'])
                                <a href="{{url('art/'.$article['pre']->art_id)}}">{{$article['pre']->art_title}}</a>
                            @else
                                <span>there is no more article</span>
                            @endif
                        </p>
                        <hr>
                        <p>next article:
                            @if($article['next'])
                                <a href="{{url('art/'.$article['next']->art_id)}}">{{$article['next']->art_title}}</a>
                            @else
                                <span>there is no more article</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
 @endsection