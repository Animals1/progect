<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
<h5>当前功能>出勤信息</h5>
	<a href="/index.php/Home/Personal/continuitydaysadd" style=" text-decoration: none;"><input type="button" value="点击打卡" style="cursor:pointer" title="打卡"></a><br/><br/><br/>
	<h3 style="margin-left:800px;"><?php echo date('Y');?>年<?php echo date('m');?>月累计出勤<?php echo "<font color='red'>".$arr."</font>";?>天</h3>
</body>
</html>