<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息管理系统-uimaker.com</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>

<script language="javascript">
	$(function(){
    $('.loginbox0').css({'position':'absolute','left':($(window).width()-810)/2});
	$(window).resize(function(){  
    $('.loginbox0').css({'position':'absolute','left':($(window).width()-810)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#df7611; background-image:url(/Public/admin/images/light1.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">


<div class="logintop">    
    <span>欢迎进入驾校管理系统</span>    
    <ul>
    <li><a href="/index.php/Home/Index/index">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody1">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox0">
    
    <ul class="loginlist" style="margin-left:200px">
    <li><a href="/index.php/Home/login/adminlogin"><img src="/Public/admin/images/l01.png"  alt="电子监察系统"/><p>管理员<br />登录</p></a></li>
    <li><a href="/index.php/Home/login/stulogin"><img src="/Public/admin/images/l02.png"  alt="电子监察系统"/><p>学员登陆<br /></p></a></li>

    </ul>
    
    
    </div>
    
    </div>
    
    <div class="loginbm">版权所有  2014&nbsp;&nbsp;&nbsp; <strong>uimaker.com</strong> &nbsp;&nbsp;&nbsp;仅供学习交流，勿用于任何商业用途</div>
	
    
</body>

</html>