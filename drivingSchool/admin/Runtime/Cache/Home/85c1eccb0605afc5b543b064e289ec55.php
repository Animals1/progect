<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/Public/admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/Public/admin/images/logo.png" title="系统首页" /></a>
    </div>
        
 
            
    <div class="topright">    
    <ul>
<<<<<<< HEAD
    <li><span><img src="/progect/drivingSchool/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#" onclick="open('help.html','介绍','width=310,height=240,left=150,top=150,resizable=no,scrollbars=no,status=yes,toolbar=no,location=no,menubar=no,menu=yes')">帮助</a></li>
    <li><a href="#" onclick="open('help.html','介绍','width=310,height=240,left=150,top=150,resizable=no,scrollbars=no,status=yes,toolbar=no,location=no,menubar=no,menu=yes')">关于</a></li>
    <li><a href="/progect/drivingSchool/index.php/Home/Login/index" target="_parent">退出</a></li>
=======
<<<<<<< HEAD
    <li><span><img src="/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
=======
    <li><span><img src="/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#" onclick="open('help.html','介绍','width=310,height=240,left=150,top=150,resizable=no,scrollbars=no,status=yes,toolbar=no,location=no,menubar=no,menu=yes')">帮助</a></li>
    <li><a href="#" onclick="open('help.html','介绍','width=310,height=240,left=150,top=150,resizable=no,scrollbars=no,status=yes,toolbar=no,location=no,menubar=no,menu=yes')">关于</a></li>
>>>>>>> 98f0fb6c4240717a6d495698588682ef1cbd8e1b
    <li><a href="/index.php/Home/Login/index" target="_parent">退出</a></li>
>>>>>>> 9dc0a85d272e5dcef2187e6e8706d830203e4520
    </ul>
     
    <div class="user">
    <span><?php echo $_COOKIE['username'];?></span>
    <i>消息</i>
    <b>5</b>
    </div>    
    
    </div>

</body>
</html>