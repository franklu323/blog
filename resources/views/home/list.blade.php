@extends('layouts.home')
@section('info')
    <title>{{$field->cate_name}}-{{Config::get('web.web_name')}}</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />
@endsection

@section('content')

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('{{asset('resources/views/home/img/art_img.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="page-heading">
                        <h1 class = "quote" style="font: 400 72px 'Arizonia', Helvetice, sans-serif;
                        color:#f4645f;
                        text-align: center;">Blog</h1>
                        <span class="subheading">Read more</span>
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
                            <span>Category:[<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>]</span>
                        </div>
                        <hr>
                    @endforeach

                    <div class="page">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection