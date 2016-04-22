<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	应发工资项
	<br />
	<?php if(is_array($wage[0])): foreach($wage[0] as $key=>$vo): ?><input type="text" value="<?php echo ($vo["name"]); ?>"  class="dfinput"/>删除
		<br /><?php endforeach; endif; ?>
	<form action="" id="ad">
		
	</form>
	<a href="javascript:void(0)" id="add">增加应发工资线</a>
	<br />
	<br />
	<br />
	应扣工资项
	<br />
	<?php if(is_array($wage[1])): foreach($wage[1] as $key=>$v): ?><input type="text" value="<?php echo ($v["name"]); ?>"  class="dfinput"/>删除
		<br /><?php endforeach; endif; ?>
	<a href="javascript:void(0)">增加应扣工资线</a>
</body>
</html>
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>   
<script type="text/javascript">
	$(function(){
		$('#add').click(function(){
			$('#ad').append('<input type="text" class="dfinput"/>')
		})
	})
</script>