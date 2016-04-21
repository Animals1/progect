<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>


    <script language="javascript">
function changeColor(){
var color="#f00|#0f0|#00f|#880|#808|#088|yellow|green|blue|gray";
color=color.split("|");
document.getElementById("blink").style.color=color[parseInt(Math.random() * color.length)];
}
setInterval("changeColor()",200);
</script> 


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
                window.location.href="/index.php/Home/Personal/createthinglist";
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>


</head>


<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">个人中心</a></li>
        <li><a href="#">代办事项</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><span><img src="/Public/admin/images/t01.png" /></span>新建事项</li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>时间</th>
            <th>代办事项</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($arr as $v) {?>
        <tr>
            <td><?php echo $v['time'];?></td>
            <td><?php echo $v['thing'];?></td>
            <td>
            	<?php if($v['status'] == 0): ?><div id="blink">代办中</div>
            	<?php else: ?> 
            	<div id="blink">已完成</div><?php endif; ?>
            </td>
            <td>
            	<?php if($v['status'] == 0): ?><a href="/index.php/Home/Personal/thingupdfield/id/<?php foreach($arr as $v){ echo $v['id'];}?>" class="tablelink">确认完成</a>  
            	<?php else: ?> 
            	<a href="/index.php/Home/Personal/thingdele/id/<?php foreach($arr as $v){ echo $v['id'];}?>" class="tablelink">删除</a><?php endif; ?>
            	
            </td>
        </tr>
        <?php }?>
       	</tbody>
        
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="paginItem"><?php echo ($page); ?></li>  
        </ul>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否确认新建事项 ？</p>
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