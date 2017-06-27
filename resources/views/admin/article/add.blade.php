@extends('layouts/admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home</a> &raquo; Article Management
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>Add Article</h3>
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
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>Add Article</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>All Articles</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">Category:</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $d)
                                    <option value="{{$d->cate_id}}">{{$d ->_cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Article Title:</th>
                        <td>
                            <input type="text" class="lg" name="art_title">
                        </td>
                    </tr>

                    <tr>
                        <th>Edit:</th>
                        <td>
                            <input type="text" class="sm" name="art_editor">
                        </td>
                    </tr>

                    <tr>
                        <th>Thumbnail:</th>
                        <td>
                            <input type="text" size="50" name="art_thumb">
                            {{--调用模版uploadify--}}
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('/resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                    $(function() {
                                    $('#file_upload').uploadify({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            //'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                                            '_token'     : "{{csrf_token()}}"
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('/admin/upload')}}", //分配uploder至url
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=art_thumb]').val(data);
                                            $('#art_thumb_img').attr('src','/'+data); //将上传图片显示在页面，下一行<th/>
                                        }

                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <img src="" alt="" id="art_thumb_img" style="max-width:350px; max-height:100px">  {{--显示图片--}}
                        </td>
                    </tr>

                    <tr>
                        <th>Keywords：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag">
                        </td>
                    </tr>

                    <tr>
                        <th>Descriptions：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>Contents：</th>
                        <td>
                            {{--调用模版ueditor--}}
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/en/en.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:590px;height:300px;"> </script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height:30px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body{
                                    overflow: hidden; height: 20px;  }
                                div.edui-box{overflow: hidden; height: 22px; }
                            </style>
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

@endsection