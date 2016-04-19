<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<<<<<<< HEAD
<link href="/eleven/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/eleven/progect/drivingSchool/Public/admin/js/jquery.js"></script>
<style>
.tech{background:url(/eleven/progect/drivingSchool/Public/admin/<?php echo ($arr['staff_photo']); ?>) no-repeat 70px 50px; height:250px;}
</style>
=======
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>

>>>>>>> 62fcccd488169925f523a0878747547f9e5969fe
<script language="javascript">
    $(function(){
    $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
    $(window).resize(function(){  
    $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
    })  
});  
</script> 
<style>

</style>

</head>


<body style="background:#FFF8ED;">

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">教练</a></li>
    <li><a href="#">个人中心</a></li>
    <li><a href="#">个人信息</a></li>
    </ul>
    </div>
    
    <div class="tech">
        
		
	<dl> 
	<dt>信息档案</dt>
    <dd><b>姓名：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_name']); ?></dd>
<<<<<<< HEAD
=======
    <dd><b>头像：</b></dd><span><img src="/Public/admin/<?php echo ($arr['staff_photo']); ?>" width="118" height="122"/></span>
>>>>>>> 62fcccd488169925f523a0878747547f9e5969fe
    <dd><b>性别：</b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php  if($arr['staff_sex'] == 1){ echo "男"; } else if($arr['staff_sex'] == 0){ echo "女"; } ?>
	</dd>
    <dd><b>民族：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_nation']); ?>族</dd>
    <dd><b>出生日期</b>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
 echo date("Y年m月d日",$arr['staff_year']); ?>
	</dd>
    <dd><b>身份证号：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_idcard']); ?></dd>
    <dd><b>籍贯：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_account']); ?></dd>
	<dd><b>职位：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['role_name']); ?></dd>
	<dd><b>教练组：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['group_name']); ?></dd>
	<dd><b>联系地址：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_curaddress']); ?></dd>
	<dd><b>手机号：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_tel']); ?></dd>
	<dd><b>邮箱：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($arr['staff_email']); ?></dd>
	</dl>
    
        
    </div>
    


</body>

</html>