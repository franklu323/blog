@extends('layouts.admin')
@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo; System Info
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>Shortcut</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>Add new article</a>
                <a href="#"><i class="fa fa-recycle"></i>Delete</a>
                <a href="#"><i class="fa fa-refresh"></i>Update</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>System Info</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>System</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>Enviroment</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>Version</label><span>v-0.1</span>
                </li>
                <li>
                    <label>Upload Limit</label>
                    <span>
                        <?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"Limit file upload";?>
                    </span>

                </li>
                <li>
                    <label>Time</label><span><?php echo date('Y-m-d H:i:s');?></span>
                </li>
                <li>
                    <label>Server/IP</label><span>{{$_SERVER['SERVER_NAME']}} [{{$_SERVER['SERVER_ADDR']}}]</span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>Help</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>About：</label><span>frank.lu</span>
                </li>
                <li>
                    <label>Contact：</label><span>346323821@qq.com</span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->
@endsection