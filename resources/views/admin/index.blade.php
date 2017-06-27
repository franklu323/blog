@extends('layouts.admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">Blog Management</div>
			<ul>
				<li><a href="{{url('/')}}" target="_blank" class="active">Home Page</a></li>
				<li><a href="{{url('admin/info')}}" target="main">Management</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li><a href="{{url('admin/pass')}}" target="main">Change password</a></li>
				<li><a href="{{url('admin/quit')}}">Logout</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>Operations</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>All Categories</a></li>
					<li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Add Category</a></li>
					<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>All Articles</a></li>
					<li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Add Article</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>Web Manager</h3>
				<ul class="sub_menu" style="display: block">
					<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-external-link"></i>Useful Links</a></li>
					<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>Navigation</a></li>
					<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>Configuration</a></li>
				</ul>
			</li>
			{{--<li>--}}
				{{--<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>--}}
				{{--<ul class="sub_menu">--}}
					{{--<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>--}}
				{{--</ul>--}}
			{{--</li>--}}
		</ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2017. Powered By frank
	</div>
	<!--底部 结束-->
@endsection
