@extends('layouts.home')
@section('info')
    <title>{{Config::get('web.web_name')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
@endsection

@section('content')

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('resources/views/home/img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="page-heading">
                        <h1 class = "quote" style="font: 400 72px 'Arizonia', Helvetice, sans-serif;
                        color:#f4645f;
                        text-align: center;">About Me</h1>
                        <span class="subheading">This is me.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <p style="text-align:justify; text-justify:inter-ideograph;">
					I’ve completed three studies.  I studied at NZSE first,  and I did a level 6 program which was diploma in IT. It gives me a really good understanding of programming fundamentals, networking fundamentals, troubleshooting methodologies, it also had presentation skills and customer services in there. It helps me to understand how to deal with customers, how to troubleshoot problems. And on top of that, I’ve done my bachelor’s as well.
				</p>
				
				<p style="text-align:justify; text-justify:inter-ideograph;">
					The bachelor was a step up and it was specifically focused on programming but it was some networking methodologies as well. And after that, I’ve done my master’s degree as well. During my Masters’ study. I’ve learned more about computer theories, research methodologies.
				</p>
				
				<p style="text-align:justify; text-justify:inter-ideograph;">
					I guess throughout my studies, I have to deal with a lot of people from all different backgrounds. And it really helps me to build my communication skills. I’m somebody who enjoys meeting new people, who enjoy building relationships with other students, with staff. And I’m now looking for an opportunity what I can bring all of these academic skills that I’ve learned from school.
				</p>
            </div>
        </div>
    </div>

    <hr>

@endsection
