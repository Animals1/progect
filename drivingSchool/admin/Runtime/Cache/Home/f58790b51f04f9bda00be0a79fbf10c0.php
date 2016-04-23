<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/drivingSchool/Public/admin/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/drivingSchool/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drivingSchool/Public/admin/js/jquery.js"></script>

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



<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar1">
            <li><span><img src="/drivingSchool/Public/admin/images/t05.png" /></span><a href="/drivingSchool/index.php/Home/Administration/addveh"><a
                    href="/drivingSchool/index.php/Home/Administration/addbus">增开班车</a></li>
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
                    <a href="/drivingSchool/index.php/Home/Administartion/busupdate/id/<?php echo ($bus["bus_id"]); ?>">修改</a>
                    <a href="/drivingSchool/index.php/Home/Administration/busdel/id/<?php echo ($bus["bus_id"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <div class="list-page">
            <?php echo ($page); ?>
        </div>
    </div>






</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>