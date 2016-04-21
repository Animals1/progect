<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
<<<<<<< HEAD
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/cloud.js" type="text/javascript"></script>
=======
<<<<<<< HEAD
<link href="/eleven/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/eleven/progect/drivingSchool/Public/admin/js/jquery.js"></script>
<script src="/eleven/progect/drivingSchool/Public/admin/js/cloud.js" type="text/javascript"></script>
=======
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/cloud.js" type="text/javascript"></script>
>>>>>>> ea3b441632431bcbef8f27b98e4307c57fb57eeb
>>>>>>> 19c039c4c50f7609f84d4982512dfd934621e634

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<<<<<<< HEAD
<body style="background-color:#df7611; background-image:url(/Public/admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
=======
<<<<<<< HEAD
<body style="background-color:#df7611; background-image:url(/eleven/progect/drivingSchool/Public/admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
=======
<body style="background-color:#df7611; background-image:url(/Public/admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
>>>>>>> ea3b441632431bcbef8f27b98e4307c57fb57eeb
>>>>>>> 19c039c4c50f7609f84d4982512dfd934621e634



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>驾校管理系统</span>    
    <ul>
<<<<<<< HEAD
    <li><a href="/index.php/Home/Login/index">回首页</a></li>
=======
<<<<<<< HEAD
    <li><a href="/eleven/progect/drivingSchool/index.php/Home/Login/index">回首页</a></li>
=======
    <li><a href="/index.php/Home/Login/index">回首页</a></li>
>>>>>>> ea3b441632431bcbef8f27b98e4307c57fb57eeb
>>>>>>> 19c039c4c50f7609f84d4982512dfd934621e634
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
<<<<<<< HEAD
    <form action="/index.php/Home/Index/index" method="post" onsubmit="return funall();">
=======
<<<<<<< HEAD
    <form action="/eleven/progect/drivingSchool/index.php/Home/Index/index" method="post" onsubmit="return funall();">
=======
    <form action="/index.php/Home/Index/index" method="post" onsubmit="return funall();">
>>>>>>> ea3b441632431bcbef8f27b98e4307c57fb57eeb
>>>>>>> 19c039c4c50f7609f84d4982512dfd934621e634
    <ul>
    <li><input name="uname" id="uname" type="text" class="loginuser" placeholder="请输入用户名" onblur="fun1();" /><span id="span_name"></span></li>
    <li><input name="upwd" id="upwd" type="password" class="loginpwd" placeholder="请输入密码" onblur="fun2();" /><span id="span_pwd"></span></li>
    <li><input  type="submit" class="loginbtn" value="登录" name="sub"/><label>
    <input type="checkbox" name="checkbox" id="checkbox" value="7" />
    记住密码</label><label><a href="#">忘记密码？</a>
    </label></li>
    </ul>
    </form>
    
    
    </div>
    
    </div>
</body>
<script type="text/javascript">
    function funall(){
        if(fun1()&&fun2()){
            return true;
        }else{
            return false;
        }
    }


    function fun1(){
        var uname = document.getElementById("uname").value;
        if(uname==""){
            document.getElementById("span_name").innerHTML="账号不能为空";
            return false;
        }else{
            document.getElementById("span_name").innerHTML="";
            return true;
        }
    }


    function fun2(){
        var upwd = document.getElementById("upwd").value;
        if(upwd==""){
            document.getElementById("span_pwd").innerHTML="密码不能为空";
            return false;
        }else{
            document.getElementById("span_pwd").innerHTML="";
            return true;
        }
    }
</script>

</html>