<<<<<<< HEAD
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/eleven/progect/drivingSchool/Public/admin/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/eleven/progect/drivingSchool/Public/admin/js/jquery.js"></script>
<style>
.tech{background:url(/eleven/progect/drivingSchool/Public/admin/<?php echo ($one['staff_photo']); ?>) no-repeat 70px 50px; height:250px;}
</style>
<script language="javascript">
    $(function(){
    $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
    $(window).resize(function(){  
    $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
    })  
});  
</script> 
<style>
=======
<?php if (!defined('THINK_PATH')) exit();?><!-- 引入分页样式 start-->
<<<<<<< HEAD
<link href="/Public/admin/css/mypage.css" rel="stylesheet" type="text/css"/>
=======
<link href="/eleven/progect/drivingSchool/Public/admin/css/mypage.css" rel="stylesheet" type="text/css"/>
>>>>>>> 5a688202cef60f8aa4425a0f037aa21e06936156
<!--  分页样式 end -->
>>>>>>> 62fcccd488169925f523a0878747547f9e5969fe

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
    <dd><b>教练名称</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['staff_name']); ?></dd>
    <dd><b>服务态度</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['zong_service_num']); ?></dd>
    <dd><b>教学质量</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['zong_teach_num']); ?></dd>
    <dd><b>行为规范</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['zong_behavior_num']); ?></dd>
    <dd><b>廉洁教学</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['zong_honest_num']); ?></dd>
    <dd><b>综合评分</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($one['zong_total_num']); ?></dd>
    </dl>    
    </div>
    <table class="tablelist">
	<?php foreach($list as $v){?>
		<img src="<?php echo "/eleven/progect/drivingSchool/Public/admin/".$v['stu_photo'];?>" width="20" height="20">&nbsp;&nbsp;
		总体评价:&nbsp;&nbsp;<?php echo $v['total_num'];?>&nbsp;&nbsp;&nbsp;&nbsp;
		服务态度:&nbsp;&nbsp;<?php echo $v['service_num'];?>&nbsp;&nbsp;&nbsp;&nbsp;
		教学质量:&nbsp;&nbsp;<?php echo $v['teach_num'];?>&nbsp;&nbsp;&nbsp;&nbsp;
		行为规范:&nbsp;&nbsp;<?php echo $v['behavior_num'];?>&nbsp;&nbsp;&nbsp;&nbsp;
		廉洁教学:&nbsp;&nbsp;<?php echo $v['honest_num'];?><br>
		名字:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['stu_name'];?>
		&nbsp;&nbsp;&nbsp;&nbsp;评论:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['r_content'];?>
    <?php } ?>
       
	<?php echo ($page); ?>
        
		
    </table>
</body>

</html>