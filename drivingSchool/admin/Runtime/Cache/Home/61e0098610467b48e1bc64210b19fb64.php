<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
  window.location.href="/index.php/Home/Usermanager/nameaddlist";
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">用户管理</a></li>
    <li><a href="#">账号管理</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
        <ul class="toolbar">
        <li class="click"><span><img src="/Public/admin/images/t01.png" /></span>新建账号</li>
        </ul>
      
    </div>
    
    
    <table class="tablelist" id="va">
        <thead>
        <tr>
        <th>序号</th>
        <th>员工姓名</th>
        <th>账号</th>
        <th>邮箱</th>
        <th>手机号码</th>
        <th>状态</th>
        <th>角色</th>
        <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($arr as $v){?>
        <tr>
        <td><?php echo $v['admin_id'];?></td>
        <td><?php echo $v['staff_name'];?></td>
        <td><?php echo $v['admin_name'];?></td>
        <td><?php echo $v['staff_email'];?></td>
        <td><?php echo $v['staff_tel'];?></td>
        <td>
            <?php if($v['admin_status'] == 0): ?>无效    <?php else: ?> <font color="blue">有效</font><?php endif; ?>
        </td>
        <td><?php echo $v['role_name'];?></td>
        <td><a href="/index.php/Home/Usermanager/usermanagerlistiddele/id/<?php echo $v['id'];?>" class="tablelink" title="删除">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Usermanager/aboutsavelist" class="tablelink" title="修改"> 修改</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Usermanager/pwdreset/id/<?php echo $v['admin_id'];?>" class="tablelink" title="密码将会被修改为默认初始化密码:666666"> 重置密码</a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    <script type="text/javascript">
        

    </script>
    
   
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"><?php echo ($page); ?></li>
        </ul>
    </div>
    
    
    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Public/admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>您是否要创建新账号 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>

</body>

</html>