<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

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


<?php if($_COOKIE['roleid'] == 7): ?><!--超级管理start-->

<div class="lefttop" id="school" style="cursor:pointer;"><span></span>
        超级管理
    </div>
    <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><div id='driving' style="display:block;">
    <dl class="leftmenu">
        
    <dd>
    
    <div class="title">
    <span><img src="/Public/admin/images/leftico01.png" /></span><?php echo $v['privilege_name'];?>
    </div>

        <ul class="menuson">
            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vv): ?><li>
        
            <div class="header">
            <cite></cite>
            <a href="javascript:void(0);"><?php echo $vv['privilege_name'];?></a>
            <i></i>
            </div>
       
            <?php if(is_array($vv["childs"])): foreach($vv["childs"] as $key=>$vvo): ?><ul class="sub-menus">
            
            <li><a href="/index.php/Home/<?php echo $vvo['privilege_controller'];?>/<?php echo $vvo['privilege_method'];?>" target="rightFrame"><?php echo $vvo['privilege_name']?></a></li>
            <!--/index.php/Home/Admin/index-->
        
             
            </ul><?php endforeach; endif; ?>
        </li><?php endforeach; endif; ?> 
    </ul><?php endforeach; endif; ?>
        

        </dd>
    </dl>

</div>

<!--超级管理end-->

<?php else: ?>

<!--普通用户start-->

<div class="lefttop" id="school" style="cursor:pointer;"><span></span>
        <?php
 if($_COOKIE['rolename']=="学员"){ echo "学员端"; }else{ echo "驾校端"; } ?>
    </div>
<div id='driving' style="display:block;">
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/Public/admin/images/leftico01.png" /></span><?php echo $_COOKIE['rolename'];?>
    </div>
        <ul class="menuson">
            <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li>
            <div class="header">
            <cite></cite>
            <a href="javascript:void(0);"><?php echo $v['privilege_name']?></a>
            <i></i>
            </div>
            
            <ul class="sub-menus">
            <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vv): ?><li><a href="/index.php/Home/<?php echo $vv['privilege_controller'];?>/<?php echo $vv['privilege_method'];?>" target="rightFrame"><?php echo $vv['privilege_name']?></a></li>
            <!--/index.php/Home/Admin/index--><?php endforeach; endif; ?>
            </ul>
           
        </li><?php endforeach; endif; ?>
    </ul>

        

        </dd>
    </dl>

</div>

<!--普通用户end--><?php endif; ?>




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