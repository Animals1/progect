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
	<?php if(is_array($wage[0])): foreach($wage[0] as $key=>$vo): ?><input type="text" value="<?php echo ($vo["name"]); ?>"  class="dfinput"/>
		<a href="/progect/drivingSchool/index.php/Home/Staff/wagedel/id/<?php echo ($vo["in_out_id"]); ?>">删除</a>
		<br /><?php endforeach; endif; ?>
	<form action="/progect/drivingSchool/index.php/Home/Staff/wageadd" method="post">
		<div id="ad"></div>
		<input type="hidden" name="pid" value="1" />
		<input name="" type="submit" class="btn" value="保存"/>
	</form>
	<a href="javascript:void(0)" id="add">增加应发工资线</a>
	<br />
	<br />
	<br />
	应扣工资项
	<br />
	<?php if(is_array($wage[1])): foreach($wage[1] as $key=>$v): ?><input type="text" value="<?php echo ($v["name"]); ?>"  class="dfinput"/>
		<a href="/progect/drivingSchool/index.php/Home/Staff/wagedel/id/<?php echo ($v["in_out_id"]); ?>">删除</a>
		<br /><?php endforeach; endif; ?>
	<form action="/progect/drivingSchool/index.php/Home/Staff/wageadd" method="post">
		<div id="ads"></div>
		<input type="hidden" name="pid" value="2" />
		<input name="" type="submit" class="btn" value="保存"/>
	</form>
	<a href="javascript:void(0)" id="adds">增加应扣工资线</a>
</body>
</html>
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>   
<script type="text/javascript">
	$(function(){
		$('#add').click(function(){
			$('#ad').append('<input type="text" name="name[]" class="dfinput"/><br />')
		})
		$('#adds').click(function(){
			$('#ads').append('<input type="text" name="name[]" class="dfinput"/><br />')
		})
	})
</script>