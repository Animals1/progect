<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/admin/js/jquery.js"></script>

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
    <span><img src="/Public/admin/images/leftico01.png" /></span>管理员
    </div>
        <ul class="menuson">
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>
            <ul class="sub-menus">
            <li><a href="/index.php/Home/Admin/index" target="rightFrame">个人信息</a></li>
            <li><a href="/index.php/Home/Admin/attendance" target="rightFrame">出勤信息</a></li>

            <li><a href="/index.php/Home/Admin/leave" target="rightFrame">请假管理</a></li>
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
            <li><a href="/index.php/Home/UserManager/index" target="rightFrame">帐号管理</a></li>
            <li><a href="/index.php/Home/UserManager/role" target="rightFrame">角色管理</a></li>
            <li><a href="/index.php/Home/UserManager/previlege" target="rightFrame">权限管理</a></li>
            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">公司维护</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="/index.php/Home/Company/index" target="rightFrame">基本信息</a></li>
            <li><a href="/index.php/Home/Company/index" target="rightFrame">学费设置</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">操作日志</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="/index.php/Home/Log/index" target="rightFrame">登录操作</a></li>
            <li><a href="/index.php/Home/Log/page" target="rightFrame">页面操作</a></li>
            </ul>
        </li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="/Public/admin/images/leftico02.png" /></span>教练
    </div>
    <ul class="menuson">
        
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>
            <ul class="sub-menus">
            <li><a href="/index.php/Home/Coach/personal_info" target="rightFrame">个人信息</a></li>
            <li><a href="/index.php/Home/Coach/award" target="rightFrame">评价考核</a></li>
            <li><a href="/index.php/Home/Coach/attendance" target="rightFrame">出勤信息</a></li>
            <li><a href="/index.php/Home/Coach/leave" target="rightFrame">请假管理</a></li>
            <li><a href="/index.php/Home/Coach/leave" target="rightFrame">工资明细</a></li>
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
            <li><a href="/index.php/Home/Service/getrepaircar" target="rightFrame">换车记录</a></li>
            <li><a href="/index.php/Home/Service/oil" target="rightFrame">油气记录</a></li>
            <li><a href="/index.php/Home/Service/repair" target="rightFrame">维修记录</a></li>
            </ul>
        </li>
        </ul>    
    </dd> 
    
    
    <dd><div class="title"><span><img src="/Public/admin/images/leftico03.png" /></span>行政</div>
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

            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆设置</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆登记</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">新增车辆</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆出勤</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆维修</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">维修记录</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆更换</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">油气添加</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">班车管理</a></li>
            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">班车设置</a></li>

            <li><a href="/index.php/Home/Administration/vehsettingadd" target="rightFrame">车辆设置</a></li>
            <li><a href="/index.php/Home/Administration/registration" target="rightFrame">车辆登记</a></li>
            <li><a href="/index.php/Home/Administration/addveh" target="rightFrame">新增车辆</a></li>
            <li><a href="/index.php/Home/Administration/vehgoout" target="rightFrame">车辆出勤</a></li>
            <li><a href="/index.php/Home/Administration/vehservice" target="rightFrame">车辆维修</a></li>
            <li><a href="/index.php/Home/Administration/servicerecord" target="rightFrame">维修记录</a></li>
            <li><a href="/index.php/Home/Administration/vehreplace" target="rightFrame">车辆更换</a></li>
            <li><a href="/index.php/Home/Administration/gasadd" target="rightFrame">油气添加</a></li>
            <li><a href="/index.php/Home/Administration/buscontrol" target="rightFrame">班车管理</a></li>
            <li><a href="/index.php/Home/Administration/bussetting" target="rightFrame">班车设置</a></li>

            </ul>
        </li>
         <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">学员管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">

            <li><a href="javascript:;" target="rightFrame">学员报名</a></li>
            <li><a href="javascript:;" target="rightFrame">在校学员</a></li>
            <li><a href="javascript:;" target="rightFrame">入学登记</a></li>
            <li><a href="javascript:;" target="rightFrame">投诉管理</a></li>

            <li><a href="/index.php/Home/Administration/stureg" target="rightFrame">学员报名</a></li>
            <li><a href="/index.php/Home/Administration/stuinschool" target="rightFrame">在校学员</a></li>
            <li><a href="/index.php/Home/Administration/regstu" target="rightFrame">入学登记</a></li>
            <li><a href="/index.php/Home/Administration/suitcontrol" target="rightFrame">投诉管理</a></li>

            </ul>
        </li>
        <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">教练管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">

            <li><a href="javascript:;"  target="rightFrame" >教练信息</a></li>
            <li><a href="javascript:;"  target="rightFrame" >教练分组</a></li>
            <li><a href="javascript:;"  target="rightFrame" >教练学时</a></li>
            <li><a href="javascript:;"  target="rightFrame" >教练排课</a></li>

            <li><a href="/index.php/Home/Administration/trainmsg" target="rightFrame">教练信息</a></li>
            <li><a href="/index.php/Home/Administration/traingroup" target="rightFrame">教练分组</a></li>
            <li><a href="/index.php/Home/Administration/teachtime" target="rightFrame">教练学时</a></li>
            <li><a href="/index.php/Home/Administration/trainclass" target="rightFrame">教练排课</a></li>
            </ul>
        </li>
        </ul>     
    </dd>  
    
    
    <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>人事</div>
    <ul class="menuson">
        <li><cite></cite><a href="/index.php/Home/Personal/index"  target="rightFrame">自定义</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">常用资料</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">信息列表</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">其他</a><i></i></li>
    </ul>
    
    </dd> 

       <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>财务</div>
    <ul class="menuson">
<<<<<<< HEAD
        <li>
            <div class="header">
                <cite></cite>
                <a href="javascript:;" target="rightFrame">收费管理</a>
                <i></i>
            </div>
            <ul class="sub-menus">
                <li><a href="javascript:;">收费明细</a></li>
                <li><a href="javascript:;">欠费明细</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
                <cite></cite>
                <a href="javascript:;" target="rightFrame">工资管理</a>
                <i></i>
            </div>
            <ul class="sub-menus">
                <li><a href="javascript:;">工资明细</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
                <cite></cite>
                <a href="javascript:;" target="rightFrame">费用支出</a>
                <i></i>
            </div>
            <ul class="sub-menus">
                <li><a href="javascript:;">支出明细</a></li>
            </ul>
        </li>
        <li>
            <div class="header">
                <cite></cite>
                <a href="javascript:;" target="rightFrame">财务报表</a>
                <i></i>
            </div>
            <ul class="sub-menus">
                <li><a href="javascript:;">收入报表</a></li>
                <li><a href="javascript:;">支出报表</a></li>
            </ul>
        </li>

=======
        <li><cite></cite><a href="#"  target="rightFrame">自定义</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">常用资料</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">信息列表</a><i></i></li>
        <li><cite></cite><a href="#"  target="rightFrame">其他</a><i></i></li>
>>>>>>> b91de226a61cb644d84c517d4c1529d10b40c164
    </ul>
    
    </dd> 
    
    </dl>
</div>

<div class="lefttop" id="student" style="cursor:pointer;"><span></span>学员端</div>
<div id='stu' style="display:block;">
    <dl class="leftmenu" >
        <dd><div class="title"><span><img src="/Public/admin/images/leftico04.png" /></span>学员</div>
        <ul class="menuson">
           <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">个人中心</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="/index.php/Home/Student/index"  target="rightFrame">个人信息</a></li>
            </ul>
        </li>
            <li>
            <div class="header">
            <cite></cite>
            <a href="javascript:;" target="rightFrame">预约管理</a>
            <i></i>
            </div>                
            <ul class="sub-menus">
            <li><a href="javascript:;"  target="rightFrame">预约申请</a></li>
            <li><a href="/index.php/Home/Student/stuorder"  target="rightFrame">预约记录</a></li>
            <li><a href="/index.php/Home/Student/noorder"  target="rightFrame">取消预约</a></li>
            </ul>
            </li>
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