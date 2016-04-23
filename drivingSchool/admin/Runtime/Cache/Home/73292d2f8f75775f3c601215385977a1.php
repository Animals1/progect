<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>支出统计</title>
	<script language="javascript">
		function changeColor(){
			var color="#f00|#0f0|#00f|#880|#808|#088|yellow|green|blue|gray";
			color=color.split("|");
			document.getElementById("blink").style.color=color[parseInt(Math.random() * color.length)];
		}
		setInterval("changeColor()",200);
	</script>
</head>
<body>
<body style="background:#fff3e1;">

<div id="blink" style="text-align: center;position:absolute; top:20%; height:100px; width:90%; margin-top:-50px;line-height:100px;"><h1><font face="华文楷体">支出报表统计情况<br/><a style="float: left;text-decoration: none;margin-left: 50px;" href="/index.php/Home/Finance/charts"><font size="5" color="red" >支出报表饼状统计图</font></a><a style="float: right;text-decoration: none;" href="/index.php/Home/Finance/histograms"><font size="5" color="red" >支出报表柱状统计图</font></a></div>


</body>
</html>