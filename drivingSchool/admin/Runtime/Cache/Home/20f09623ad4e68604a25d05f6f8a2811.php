<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
                window.location.href="/index.php/Home/Finance/addsalary";
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>


</head>


<body style="background:#FFF8ED;">
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><span><img src="/Public/admin/images/t01.png" /></span>添加</li>
            <li><span><img src="/Public/admin/images/t04.png" /></span>统计</li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>发工资</li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>岗位<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>编号</th>
            <th>姓名</th>
            <th>出勤天数</th>
            <th>实发工资</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $v){?>
        <tr>
            <td><?php echo $v['role_name']; ?></td>
            <td><?php echo $v['staff_sn']; ?></td>
            <td><?php echo $v['staff_name']; ?></td>
            <td><?php echo $v['salary_day']; ?></td>
            <td><?php echo $v['salary_wages']; ?></td>
            <td><?php echo $v['salary_status_name']; ?></td>
            <td><a href="/index.php/Home/Finance/selsalasry?id=<?php echo $v['salary_id']?>" class="tablelink">查看</a>     <a href="/index.php/Home/Finance/delsalary?id=<?php echo $v['salary_id']?>" class="tablelink"> 删除</a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <div class="paginList">
            <?php echo ($page); ?>
        </div>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否进行添加 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>




</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>


</body>

</html>