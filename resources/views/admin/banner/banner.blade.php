<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
    <style>
        .paging{
            float:left;
        }

    </style>
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">导航栏管理</a>&nbsp;-</span>&nbsp;导航栏列表管理
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">ID</td>
                        <td width="315px" class="tdColor">导航栏名称</td>
                        <td width="308px" class="tdColor">导航栏网址</td>
                        <td width="450px" class="tdColor">是否展示</td>
                        <td width="215px" class="tdColor">排序</td>
                        <td width="180px" class="tdColor">添加时间</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $k=>$v)
                    <tr  data="{{$v->banner_id}}">
                        <td>{{$v->banner_id}}</td>
                        <td>{{$v->banner_name}}</td>
                        <td>{{$v->banner_url}}</td>
                        @if($v->is_show==1)
                        <td>是</td>
                        @endif
                        @if($v->is_show==2)
                            <td>否</td>
                        @endif
                        <td>{{$v->sort}}</td>
                        <td>{{Date("Y-m-d H:i:s",$v->create_time)}}</td>
                        <td><a href="/admin/bannerUp/{{$v->banner_id}}"><img class="operation" src="img/update.png" ></a>
                            <img class="operation delban" src="img/delete.png" >
                        </td>
                    </tr>
                    @endforeach

                </table>
                <div class="paging">{{$data->links()}}</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click','.delban',function(){
                var banner_id=$(this).parents('tr').attr('data');
               if(window.confirm("确认要删除吗")){
                   var data={};
                   data.banner_id=banner_id;
                   var url="/admin/bannerDel";
                   $.ajax({
                       url:url,
                       data:data,
                       dataType:'json',
                       type:'post',
                       success:function(result){
                           if(result['success']==true){
                               location.href=result['url'];
                           }else if(result['success']==false){
                               location.href=result['url'];
                           }
                       }
                   })
               }

            })
        });
    </script>
</html>