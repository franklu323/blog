@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo; Configuration
        </div>
        <!--面包屑导航 结束-->

        {{--<!--结果页快捷搜索框 开始-->--}}
        {{--<div class="search_wrap">--}}
            {{--<form action="" method="post">--}}
                {{--<table class="search_tab">--}}
                    {{--<tr>--}}
                        {{--<th width="120">选择分类:</th>--}}
                        {{--<td>--}}
                            {{--<select onchange="javascript:location.href=this.value;">--}}
                                {{--<option value="">全部</option>--}}
                                {{--<option value="http://www.baidu.com">百度</option>--}}
                                {{--<option value="http://www.sina.com">新浪</option>--}}
                            {{--</select>--}}
                        {{--</td>--}}
                        {{--<th width="70">关键字:</th>--}}
                        {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                        {{--<td><input type="submit" name="sub" value="查询"></td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<!--结果页快捷搜索框 结束-->--}}

        <!--搜索结果页面 列表 开始-->
            <div class="result_wrap">
                <div class="result_title">
                    <h3>Configuration List</h3>
                    @if(count($errors)>0)
                        <div class="mark">
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            @else
                                <p>{{$errors}}</p>
                            @endif
                        </div>
                    @endif
                </div>
                <!--快捷导航 开始-->
                <div class="result_content">
                    <div class="short_wrap">
                        <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>Add Configuration</a>
                        <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>All Configurations</a>
                    </div>
                </div>
                <!--快捷导航 结束-->
            </div>

            <div class="result_wrap">
                <div class="result_content">
                    <form action="{{url('admin/config/changecontent')}}" method="post">
                        {{csrf_field()}}
                    <table class="list_tab">
                        <tr>
                            <th class="tc" width="5%">Order</th>
                            <th class="tc" width="5%">ID</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Changes</th>
                        </tr>

                        @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->conf_id}})" value="{{$v->conf_order}}">
                            </td>
                            <td class="tc">{{$v->conf_id}}</td>
                            <td>
                                <a href="#">{{$v->conf_title}}</a>
                            </td>
                            <td>
                                <a href="#">{{$v->conf_name}}</a>
                            </td>
                            <td>
                                <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                                {!! $v->_html !!}
                            </td>
                            <td>
                                <a href="{{url('admin/config/'.$v->conf_id.'/edit ')}}">Modify</a>
                                <a href="javascript:;" onclick="delconfig({{$v->conf_id}})">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                        <div class="btn_group">
                            <input type="submit" value="Submit">
                            <input type="button" class="back" onclick="history.go(-1)" value="Back">
                        </div>
                    </form>
                </div>
            </div>
        <!--搜索结果页面 列表 结束-->

        <script>
            function changeOrder(obj,conf_id) {
                var conf_order = $(obj).val();
                $.post('{{url('admin/config/changeorder')}}',{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order},function (data) {
                    //alert(data.msg);
                    if(data.status === 0){
                        layer.msg(data.msg,{icon:6});
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                })
            }


            //Delete link
            function delconfig(conf_id) {
                //询问框
                layer.confirm('Delete?', {
                    btn: ['Yes','No'] //按钮
                }, function(){
                    $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data){
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