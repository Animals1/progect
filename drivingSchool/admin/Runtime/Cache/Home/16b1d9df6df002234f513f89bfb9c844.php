<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<<<<<<< HEAD
<link href="/eleven/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/eleven/progect/drivingSchool/Public/admin/js/jquery.js"></script>
=======
<link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>
>>>>>>> 771dd1961b628fc84fe2ce0e4eeb8fa4987b23cf
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

</head>

<body style="background:#fff3e1;">

<!--高级权限和普通权限区分-->
<?php if($_COOKIE['roleid'] == 7): ?><!--高级权限start-->
<div class="lefttop"><span></span>
    超级管理员
    </div>

    <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><dl class="leftmenu">   
    <dd>
    <div class="title">
    <span><img src="/progect/drivingSchool/Public/admin/images/leftico01.png" /></span><?php echo $v['privilege_name'];?>
    </div>
        <ul class="menuson">

        <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vv): ?><li>
            <div class="header">
            <cite></cite>
            <a href="javascript:void(0);" target="rightFrame"><?php echo $vv['privilege_name'];?></a>
            <i></i>
            </div>

            <?php if(is_array($vv["childs"])): foreach($vv["childs"] as $key=>$vo): ?><ul class="sub-menus">
            <li><a href="/progect/drivingSchool/index.php/Home/<?php echo $vo['privilege_controller'];?>/<?php echo $vo['privilege_method'];?>" target="rightFrame"><?php echo $vo['privilege_name'];?></a></li>
            </ul><?php endforeach; endif; ?>

        </li><?php endforeach; endif; ?>

        </ul>    
    </dd>
    </dl><?php endforeach; endif; ?>

<!--高级权限end-->
    


<?php else: ?>

<!--普通权限start-->
    <div class="lefttop"><span></span>
    普通用户
    </div>

    <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><dl class="leftmenu">   
    <dd>
    <div class="title">
<<<<<<< HEAD
    <span><img src="/eleven/progect/drivingSchool/Public/admin/images/leftico01.png" /></span><?php echo $v['privilege_name'];?>
=======
    <span><img src="/progect/drivingSchool/Public/admin/images/leftico01.png" /></span><?php echo $v['privilege_name'];?>
>>>>>>> 771dd1961b628fc84fe2ce0e4eeb8fa4987b23cf
    </div>
        <ul class="menuson">
        <?php if(is_array($v["childs"])): foreach($v["childs"] as $key=>$vo): ?><li>
            
            <div class="header">
            <cite></cite>
            <a href="javascript:void(0);" target="rightFrame"><?php echo $vo['privilege_name'];?></a>
            <i></i>
            </div>
            <?php if(is_array($vo["child"])): foreach($vo["child"] as $key=>$vv): ?><ul class="sub-menus">
<<<<<<< HEAD
            <li><a href="/eleven/progect/drivingSchool/index.php/Home/<?php echo $vv['privilege_controller'];?>/<?php echo $vv['privilege_method'];?>" target="rightFrame"><?php echo $vv['privilege_name'];?></a></li>
=======
            <li><a href="/progect/drivingSchool/index.php/Home/<?php echo $vv['privilege_controller'];?>/<?php echo $vv['privilege_method'];?>" target="rightFrame"><?php echo $vv['privilege_name'];?></a></li>
>>>>>>> 771dd1961b628fc84fe2ce0e4eeb8fa4987b23cf
            
            </ul><?php endforeach; endif; ?>
           
        </li><?php endforeach; endif; ?>
        </ul>    
    </dd>
    </dl><?php endforeach; endif; ?>

    <!--普通权限end--><?php endif; ?>
    
</body>
</html>