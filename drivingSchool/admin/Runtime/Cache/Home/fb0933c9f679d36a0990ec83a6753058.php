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
	<ul class="forminfo">
	<?php
 for ($i=0; $i < ($wage[0]['count'] - 1); $i++) { ?>
         	<li><label>工资项：</label><input type="text" class="dfinput" value="<?php echo $wage[0][$i]['name'];?>" />&nbsp;&nbsp;&nbsp;&nbsp;
		        金钱：<input type="text" class="dfinput" value="<?php echo $wage[0][$i]['in_out_money'];?>" />
		        &nbsp;&nbsp;
		        <a href="/progect/drivingSchool/index.php/Home/Staff/wagedel/id/<?php echo $wage[0][$i]['in_out_id'];?>">删除</a>
		    </li>
    <?php } ?>
	<form action="/progect/drivingSchool/index.php/Home/Staff/wageadd" method="post">
		<div id="ad"></div>
		<input type="hidden" name="pid" value="1" />
		<input name="" type="submit" class="btn" value="保存"/>
	</form>
	</ul>
	<a href="javascript:void(0)" id="add">增加应发工资线</a>
	<br />
	<br />
	<br />
	应扣工资项
	<br />
	<ul class="forminfo">
	<?php
 for ($i=0; $i < ($wage[1]['count'] - 1); $i++) { ?>
         	<li><label>工资项：</label><input type="text" class="dfinput" value="<?php echo $wage[1][$i]['name'];?>" />&nbsp;&nbsp;&nbsp;&nbsp;
		        金钱：<input type="text" class="dfinput" value="<?php echo $wage[1][$i]['in_out_money'];?>" />
		        &nbsp;&nbsp;
		        <a href="/progect/drivingSchool/index.php/Home/Staff/wagedel/id/<?php echo $wage[1][$i]['in_out_id'];?>">删除</a>
		    </li>
    <?php } ?>
	<form action="/progect/drivingSchool/index.php/Home/Staff/wageadd" method="post">
		<div id="ads"></div>
		<input type="hidden" name="pid" value="2" />
		<input name="" type="submit" class="btn" value="保存"/>
	</form>
	</ul>
	<a href="javascript:void(0)" id="adds">增加应扣工资线</a>
</body>
</html>
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>   
<script type="text/javascript">
	$(function(){
		$('#add').click(function(){
			$('#ad').append('<li><label>工资项：</label><input name="name[]" type="text" class="dfinput" />&nbsp;&nbsp;&nbsp;&nbsp;金钱：<input name="money[]" type="text" class="dfinput" />&nbsp;&nbsp;</li>')
		})
		$('#adds').click(function(){
			$('#ads').append('<li><label>工资项：</label><input name="name[]" type="text" class="dfinput" />&nbsp;&nbsp;&nbsp;&nbsp;金钱：<input name="money[]" type="text" class="dfinput" />&nbsp;&nbsp;</li>')
		})
	})
</script>