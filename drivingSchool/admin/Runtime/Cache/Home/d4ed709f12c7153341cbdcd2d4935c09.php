<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
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


<body style="background:#FFF8ED;">

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">数据表</a></li>
        <li><a href="#">基本内容</a></li>
    </ul>
</div>

<div class="rightinfo">


    <table class="tablelist">
        <thead>
        <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>身份证号</th>
            <th>报名课程</th>
            <th>联系电话</th>
            <th>户口所在地</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
    <?php if(is_array($student)): foreach($student as $key=>$stu): ?><tr>
            <td><?php echo ($stu["stu_name"]); ?></td>
            <td><?php echo ($stu["sex_name"]); ?></td>
            <td><?php echo ($stu["stu_idcard"]); ?></td>
            <td><?php echo ($stu["class_name"]); ?></td>
            <td><?php echo ($stu["stu_tel"]); ?></td>
            <td><?php echo ($stu["stu_birthplace"]); ?></td>
            <td></td>
            <td><a href="/index.php/Home/Administration/regstu">入学登记</a></td>
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