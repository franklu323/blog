@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo; Useful links
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
        <form action="#" method="post">
            <div class="result_wrap">
                <div class="result_title">
                    <h3>Link List</h3>
                </div>
                <!--快捷导航 开始-->
                <div class="result_content">
                    <div class="short_wrap">
                        <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>Add Link</a>
                        <a href="{{url('admin/links')}}"><i class="fa fa-recycle"></i>All Links</a>
                    </div>
                </div>
                <!--快捷导航 结束-->
            </div>

            <div class="result_wrap">
                <div class="result_content">
                    <table class="list_tab">
                        <tr>
                            <th class="tc" width="5%">Order</th>
                            <th class="tc" width="5%">ID</th>
                            <th>Link Name</th>
                            <th>Link Title</th>
                            <th>Link Address</th>
                            <th>Changes</th>
                        </tr>

                        @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->link_id}})" value="{{$v->link_order}}">
                            </td>
                            <td class="tc">{{$v->link_id}}</td>
                            <td>
                                <a href="#">{{$v->link_name}}</a>
                            </td>
                            <td>{{$v->link_title}}</td>
                            <td>{{$v->link_url}}</td>
                            <td>
                                <a href="{{url('admin/links/'.$v->link_id.'/edit ')}}">Modify</a>
                                <a href="javascript:;" onclick="delLinks({{$v->link_id}})">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </form>
        <!--搜索结果页面 列表 结束-->

        <script>
            function changeOrder(obj,link_id) {
                var link_order = $(obj).val();
                $.post('{{url('admin/links/changeorder')}}',{'_token':'{{csrf_token()}}','link_id':link_id,'link_order':link_order},function (data) {
                    //alert(data.msg);
                    if(data.status === 0){
                        layer.msg(data.msg,{icon:6});
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                })
            }


            //Delete link
            function delLinks(link_id) {
                //询问框
                layer.confirm('Delete?', {
                    btn: ['Yes','No'] //按钮
                }, function(){
                    $.post("{{url('admin/links/')}}/"+link_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data){
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