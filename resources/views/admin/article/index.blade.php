@extends('layouts/admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo; Article Management
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                <h3>Article List</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>Add Article</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>All Articles</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>Title</th>
                        <th>Views</th>
                        <th>Editor</th>
                        <th>Time</th>
                        <th>Changes</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v -> art_id}}</td>
                        <td>
                            <a href="#">{{$v -> art_title}}</a>
                        </td>
                        <td>{{$v -> art_view}}</td>
                        <td>{{$v -> art_editor}}</td>
                        <td>{{date('Y/m/d',$v -> art_time)}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">Modify</a>
                            <a href="javascript:;" onclick="delArt({{$v->art_id}})">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <style>
        .result_content ul li span{
            font-size:15px;
            padding: 6px 12px;
        }
    </style>
    <!--搜索结果页面 列表 结束-->

    <script>
        //Delete category
        function delArt(art_id) {
            //询问框
            layer.confirm('Delete?', {
                btn: ['Yes','No'] //按钮
            }, function(){
                $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data){
                    if(data.status === 0){
                        location.href = location.href;
                        layer.msg(data.msg,{icon:6});
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                });
            }, function(){

            });
        }
    </script>
@endsection