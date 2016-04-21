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
        <li><a href="#">行政</a></li>
        <li><a href="#">教练管理</a></li>
        <li><a href="#">教练分组</a></li>
    </ul>
</div>

<div class="rightinfo">
    <ul class="toolbar1" >
        <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/traingroupadd">新增分组</a></li>
    </ul>
<?php foreach($group as $k=>$group){?>
    <table class="tablelist">
        <thead>
        <tr>
          <h3><?php echo $group['group_name']?></h3>
        </tr>
        </thead>
        <tbody>
        <tr>
            组长:<?php echo $group['staffname']?>&nbsp;&nbsp;<?php echo $group['phone']?>
        </tr>
        <tr>
            <?php foreach($group['child'] as $key=>$v){?>
            <td>组员:<?php echo $v['staffname']?>&nbsp;&nbsp;<?php echo $v['phone']?></td>
        <?php }?>
            <a href="/index.php/Home/Administration/delgroup/id/<?php echo $group['group_id']?>">删除</a>

        </tr>


        </tbody>
    </table>
<?php }?>




</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>