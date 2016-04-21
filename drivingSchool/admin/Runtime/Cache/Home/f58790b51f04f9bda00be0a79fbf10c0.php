<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".click").click(function(){
                $(".tip").fadeIn(200);
            });

            $(".tiptop a").click(function(){
                $(".tip").fadeOut(200);
            });

            $(".sure").click(function(){
                $(".tip").fadeOut(100);
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>


</head>


<body style="background:#FFF8ED;" id="div">

<!--<div class="place">-->
<!--<span>位置：</span>-->
<!--<ul class="placeul">-->
<!--<li><a href="#">首页</a></li>-->
<!--<li><a href="#">数据表</a></li>-->
<!--<li><a href="#">基本内容</a></li>-->
<!--</ul>-->
<!--</div>-->

<div class="rightinfo">

    <div class="tools">

        <!--<ul class="toolbar">-->
            <!--<li class="click1"><span><img src="/Public/admin/images/t01.png" /></span><a href="/index.php/Home/Administration/addveh">添加</a></li>-->
            <!--<li class="click1"><span><img src="/Public/admin/images/t02.png" /></span><a href="">修改</a></li>-->
            <!--<li><span><img src="/Public/admin/images/t03.png" /></span><a href="javascript:; delAll()">删除</a></li>-->
            <!--<li><span><img src="/Public/admin/images/t04.png" /></span><a href="">统计</a></li>-->


        <!--</ul>-->


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/addveh"><a
                    href="/index.php/Home/Administration/addbus">增开班车</a></li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>班车路线</th>
            <th>车牌号</th>
            <th>途经站</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($busset)): foreach($busset as $key=>$bus): ?><tr>

                <td><?php echo ($bus["bus_route"]); ?></td>
                <td><?php echo ($bus["car_number"]); ?></td>
                <td><?php echo ($bus["bus_station"]); ?></td>

                <td>
                    <a href="/index.php/Home/Administartion/busupdate/id/<?php echo ($bus["bus_id"]); ?>">修改</a>
                    <a href="/index.php/Home/Administration/busdel/id/<?php echo ($bus["bus_id"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>



    <div class="pagin">
        <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem current"><a href="javascript:;">2</a></li>
            <li class="paginItem"><a href="javascript:;">3</a></li>
            <li class="paginItem"><a href="javascript:;">4</a></li>
            <li class="paginItem"><a href="javascript:;">5</a></li>
            <li class="paginItem more"><a href="javascript:;">...</a></li>
            <li class="paginItem"><a href="javascript:;">10</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否确认对信息的修改 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>




</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>