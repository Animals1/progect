<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>收入统计</title>
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

	<div id="blink" style="position:absolute; top:20%; height:100px; width:90%; margin-top:-50px;line-height:100px;"><h1><font face="华文楷体">收入报表统计情况<br/><a style="float: right;text-decoration: none;" href="/index.php/Home/Finance/chart"><font size="5" color="red" >收入报表饼状统计图</font></a><br><a style="float: right;text-decoration: none;" href="/index.php/Home/Finance/histogram"><font size="5" color="red" >收入报表柱状统计图</font></a></div>


</body>
</html>