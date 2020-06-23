<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="/admin/index">首页</a>&nbsp;-&nbsp;<a
                        href="#">导航栏管理</a>&nbsp;-</span>&nbsp;添加管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>上传导航栏</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    导航栏名称：<input type="text" class="input1" name="banner_name" />
                </div>
                <div class="bbD">
                    导航栏网址：<input type="text" class="input1"  name="banner_url"/>
                </div>
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" checked="checked" value="1" name="is_show" />是</label>
                    <label><input type="radio" value="2"  name="is_show"/>否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2" type="text"  name="sort"/>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" name="but" >提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        //给提交按钮绑定一个点击事件
        $(document).on('click',"button[name='but']",function(){
            var banner_name=$("input[name='banner_name']").val();
            var banner_url=$("input[name='banner_url']").val();
            var is_show=$("input[name='is_show']").val();
            var sort=$("input[name='sort']").val();
            var data={};
            data.banner_name=banner_name;
            data.banner_url=banner_url;
            data.is_show=is_show;
            data.sort=sort;
            var url="/admin/bannerDo";
            $.ajax({
                dataType:'json',
                url:url,
                data:data,
                type:'post',
                success:function(result){
                    if(result['success']==true){
                        location.href=result['url'];
                    }else if(result['success']==false){
                        location.href=result['url'];
                    }
                }

            })
        });
    });
</script>