<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<<<<<<< HEAD
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>
=======
<link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b

<script type="text/javascript">
$(function(){   
    //导航切换
    $(".menuson .header").click(function(){
        var $parent = $(this).parent();
        $(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
        
        $parent.addClass("active");
        if(!!$(this).next('.sub-menus').size()){
            if($parent.hasClass("open")){
                $parent.removeClass("open").find('.sub-menus').hide();
            }else{
                $parent.addClass("open").find('.sub-menus').show(); 
            }
            
            
        }
    });
    
    // 三级菜单点击
    $('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
        $(this).addClass("active");
    });
    
    $('.title').click(function(){
        var $ul = $(this).next('ul');
        $('dd').find('.menuson').slideUp();
        if($ul.is(':visible')){
            $(this).next('.menuson').slideUp();
        }else{
            $(this).next('.menuson').slideDown();
        }
    });
})  
</script>


</head>

<body style="background:#fff3e1;">
   
    <div class="lefttop" id="school" style="cursor:pointer;"><span></span>驾校端</div>
<div id='driving' style="display:block;">
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
<<<<<<< HEAD
    <span><img src="/Public/admin/images/leftico01.png" /></span>管理员
=======
    <span><img src="/progect/drivingSchool/Public/admin/images/leftico01.png" /></span>管理员
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
    </div>
        <ul class="menuson">
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>
            <ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/index.php/Home/Admin/index" target="rightFrame">个人信息</a></li>
            <li><a href="/index.php/Home/Admin/attendance" target="rightFrame">出勤信息</a></li>

            <li><a href="/index.php/Home/Admin/leave" target="rightFrame">请假管理</a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/Admin/index" target="rightFrame">个人信息</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Admin/attendance" target="rightFrame">出勤信息</a></li>

            <li><a href="/progect/drivingSchool/index.php/Home/Admin/leave" target="rightFrame">请假管理</a></li>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
            <li><a href="javascript:;" target="rightFrame">工资明细</a></li>
            </ul>
        </li>
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">用户管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/index.php/Home/UserManager/index" target="rightFrame">帐号管理</a></li>
            <li><a href="/index.php/Home/UserManager/role" target="rightFrame">角色管理</a></li>
            <li><a href="/index.php/Home/UserManager/previlege" target="rightFrame">权限管理</a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/UserManager/index" target="rightFrame">帐号管理</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/UserManager/role" target="rightFrame">角色管理</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/UserManager/previlege" target="rightFrame">权限管理</a></li>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">公司维护</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/index.php/Home/Company/index" target="rightFrame">基本信息</a></li>
            <li><a href="/index.php/Home/Company/index" target="rightFrame">学费设置</a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/Company/index" target="rightFrame">基本信息</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Company/index" target="rightFrame">学费设置</a></li>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
            </ul>
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">操作日志</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/index.php/Home/Log/index" target="rightFrame">登录操作</a></li>
            <li><a href="/index.php/Home/Log/page" target="rightFrame">页面操作</a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/Log/index" target="rightFrame">登录操作</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Log/page" target="rightFrame">页面操作</a></li>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
            </ul>
        </li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
<<<<<<< HEAD
    <span><img src="/Public/admin/images/leftico02.png" /></span>教练
=======
    <span><img src="/progect/drivingSchool/Public/admin/images/leftico02.png" /></span>教练
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
    </div>
    <ul class="menuson">
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>
            <ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/index.php/Home/Coach/personal_info" target="rightFrame">个人信息</a></li>
            <li><a href="/index.php/Home/Coach/award" target="rightFrame">评价考核</a></li>
            <li><a href="/index.php/Home/Coach/attendance" target="rightFrame">出勤信息</a></li>
            <li><a href="/index.php/Home/Coach/leave" target="rightFrame">请假管理</a></li>
            <li><a href="/index.php/Home/Coach/leave" target="rightFrame">工资明细</a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/Coach/personal_info" target="rightFrame">个人信息</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Coach/award" target="rightFrame">评价考核</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Coach/attendance" target="rightFrame">出勤信息</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Coach/leave" target="rightFrame">请假管理</a></li>
            <li><a href="/progect/drivingSchool/index.php/Home/Coach/leave" target="rightFrame">工资明细</a></li>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
            </ul>
        </li>
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">学员管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;" target="rightFrame">我的学员</a></li>
            <li><a href="javascript:;" target="rightFrame">学员进度详情</a></li>
            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">排课管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;" target="rightFrame">我的排课</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">车辆管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;" target="rightFrame">换车记录</a></li>
            <li><a href="javascript:;" target="rightFrame">油气记录</a></li>
            <li><a href="javascript:;" target="rightFrame">维修记录</a></li>
            </ul>
        </li>
        </ul>    
    </dd> 
    
    
<<<<<<< HEAD
    <dd><div class="title"><span><img src="/Public/admin/images/leftico03.png" /></span>行政</div>
=======
    <dd><div class="title"><span><img src="/progect/drivingSchool/Public/admin/images/leftico03.png" /></span>行政</div>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
    <ul class="menuson">
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>
        </li>
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">车辆管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;">车辆设置</a></li>
            <li><a href="javascript:;">车辆登记</a></li>
            <li><a href="javascript:;">新增车辆</a></li>
            <li><a href="javascript:;">车辆出勤</a></li>
            <li><a href="javascript:;">车辆维修</a></li>
            <li><a href="javascript:;">维修记录</a></li>
            <li><a href="javascript:;">车辆更换</a></li>
            <li><a href="javascript:;">油气添加</a></li>
            <li><a href="javascript:;">班车管理</a></li>
            <li><a href="javascript:;">班车设置</a></li>
            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">学员管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;">学员报名</a></li>
            <li><a href="javascript:;">在校学员</a></li>
            <li><a href="javascript:;">入学登记</a></li>
            <li><a href="javascript:;">投诉管理</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">教练管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;">教练信息</a></li>
            <li><a href="javascript:;">教练分组</a></li>
            <li><a href="javascript:;">教练学时</a></li>
            <li><a href="javascript:;">教练排课</a></li>
            </ul>
        </li>
        </ul>     
    </dd>  
    
    
<<<<<<< HEAD
    <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>人事</div>
=======
    <dd><div class="title"><span><img src="/progect/drivingSchool/Public/admin/images/leftico04.png" /></span>人事</div>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
    <ul class="menuson">
        <li><cite></cite><a href="#">自定义</a><i></i></li>
        <li><cite></cite><a href="#">常用资料</a><i></i></li>
        <li><cite></cite><a href="#">信息列表</a><i></i></li>
        <li><cite></cite><a href="#">其他</a><i></i></li>
    </ul>
    
    </dd> 

<<<<<<< HEAD
       <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>财务</div>
=======
       <dd><div class="title"><span><img src="/progect/drivingSchool/Public/admin/images/leftico04.png" /></span>财务</div>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
    <ul class="menuson">
        <li><cite></cite><a href="#">自定义</a><i></i></li>
        <li><cite></cite><a href="#">常用资料</a><i></i></li>
        <li><cite></cite><a href="#">信息列表</a><i></i></li>
        <li><cite></cite><a href="#">其他</a><i></i></li>
    </ul>
    
    </dd> 
    
    </dl>
</div>

<div class="lefttop" id="student" style="cursor:pointer;"><span></span>学员端</div>
<div id='stu' style="display:block;">
    <dl class="leftmenu" >
<<<<<<< HEAD
        <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>学员</div>
=======
        <dd><div class="title"><span><img src="/progect/drivingSchool/Public/admin/images/leftico04.png" /></span>学员</div>
>>>>>>> 7bf1998cdc43b73ad715f3bc762245f53d533d2b
        <ul class="menuson">
            <li><cite></cite><a href="#">自定义</a><i></i></li>
            <li><cite></cite><a href="#">常用资料</a><i></i></li>
            <li><cite></cite><a href="#">信息列表</a><i></i></li>
            <li><cite></cite><a href="#">其他</a><i></i></li>
        </ul>
        
        </dd> 
    </dl>

</div>


<script>
    $("#school").click(function(){
        var obj=document.getElementById('driving');
        //alert(obj.style.display);
        if(obj.style.display=='block')
        {
            $("#driving").hide();
        }else
        {
            $("#driving").show();
        }
       
    })

    /*学员*/
     $("#student").click(function(){
        var obj=document.getElementById('stu');
        //alert(obj.style.display);
        if(obj.style.display=='block')
        {
            $("#stu").hide();
        }else
        {
            $("#stu").show();
        }
       
    })
</script>  
</body>
</html>