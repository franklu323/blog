@extends('layouts/admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo;  Configuration

    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>Add Configuration</h3>
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>Add Configuration</a>
                <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>All Configurations</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                    <tr>
                        <th><i class="require">*</i>Title:</th>
                        <td>
                            <input type="text" name="conf_title">
                            <span><i class="fa fa-exclamation-circle yellow"></i>Please filled up config title</span>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>Name:</th>
                        <td>
                            <input type="text" name="conf_name">
                            <span><i class="fa fa-exclamation-circle yellow"></i>Please filled up config name</span>
                        </td>
                    </tr>

                    <tr>
                        <th>Type:</th>
                        <td>
                            <input type="radio" name="field_type" value="input" checked onclick="showTr()">Input　
                            <input type="radio" name="field_type" value="textarea" onclick="showTr()">Textarea　
                            <input type="radio" name="field_type" value="radio" onclick="showTr()">Radio
                        </td>
                    </tr>

                    <tr class="field_value">
                        <th>Value:</th>
                        <td>
                            <input type="text" class="lg" name="field_value" >
                            <p><i class="fa fa-exclamation-circle yellow"></i>Type value only needs for radio type: 1|Open, 0|Close</p>
                        </td>
                    </tr>

                    <tr>
                        <th>Order:</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" value="0">
                        </td>
                    </tr>

                    <tr>
                        <th>Illustrate:</th>
                        <td>
                            <textarea id="" cols="30" rows="10" name="conf_tips"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="Submit">
                            <input type="button" class="back" onclick="history.go(-1)" value="Back">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        showTr();
        function showTr() {
            var type = $('input[name=field_type]:checked').val();
            if(type==='radio'){
                $('.field_value').show();
            }else{
                $('.field_value').hide();
            }
        }
    </script>

@endsection