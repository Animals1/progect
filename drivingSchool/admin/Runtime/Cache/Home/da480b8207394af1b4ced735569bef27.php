<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>




</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">教练</a></li>
    <li><a href="#">车辆管理</a></li>
    <li><a href="#">维修记录</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
		
        <ul class="toolbar1">
        <li><span><img src="/Public/admin/images/t05.png" /></span>我要修车</li>
        </ul>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>申请人名字<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
        <th>申请时间</th>
        <th>车牌号</th>
        <th>保修原因</th>
        <th>处理人</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><tr>
        <td><?php echo ($vo["repair_name"]); ?></td>
        <td><?php echo date("Y-m-d",$vo['repair_time']);?></td>
        <td><?php echo ($vo["car_number"]); ?></td>
        <td><?php echo ($vo["repair_desc"]); ?></td>
        <td><?php echo ($vo["repair_rename"]); ?></td>
        <td><?php echo ($vo["repair_statusname"]); ?></td>
        <td><a href="javascript:void(0);" class="tablelink" value="<?php echo ($vo["replace_id"]); ?>" type='update'>修改</a> |  <a href="javascript:void(0);" class="tablelink" value="<?php echo ($vo["replace_id"]); ?>" type='delete'> 删除</a></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    
   
    <div class="pagin">
    	<div class="message"><?php echo ($page); ?></div>
        <ul class="paginList">
        </ul>
    </div>
    
    </div>
    
    
	<script>
	$(function(){
		$('.tablelink').click(function(){
			$that = $(this);
			var type = $(this).attr('type');
			var value = $(this).attr('value');
			if(type == "update"){
				location.href="/index.php/Home/Service/updaterepaircar/id/"+value;
			}
			else if(type == "delete"){
				url = "/index.php/Home/Service/delrepaircar"
				$.post(url,{'id' : value},function(data){
					if(data == 1){
						$that.parent().parent().remove();
					}
					else
					{
						return false;
					}
				})
			}else
			{
				return false;
			}
		})
	})
	</script>
</body>

</html>