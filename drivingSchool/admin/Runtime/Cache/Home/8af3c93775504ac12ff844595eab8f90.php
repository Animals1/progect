<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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


<body style="background:#FFF8ED;">

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">车辆管理</a></li>
        <li><a href="#">维修记录</a></li>
    </ul>
</div>

<div class="rightinfo">


    <table class="tablelist">
        <thead>
        <tr>
            <th>车辆</th>
            <th>维修日期</th>
            <th>故障原因</th>
            <th>维修结果</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($repair_record)): foreach($repair_record as $key=>$record): ?><tr>
            <td><?php echo ($record["car_number"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$record["record_time"])); ?></td>
            <td><?php echo ($record["repair_desc"]); ?></td>
            <td><?php echo ($record["repair_record"]); ?></td>
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