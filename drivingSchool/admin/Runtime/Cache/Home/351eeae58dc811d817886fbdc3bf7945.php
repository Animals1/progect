<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/eleven/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/eleven/progect/drivingSchool/Public/admin/js/jquery.js"></script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">教练</a></li>
    <li><a href="#">车辆管理</a></li>
    <li><a href="/eleven/progect/drivingSchool/index.php/Home/Service/getrepaircar">换车记录</a></li>
    <li><a href="#">修改换车记录</a></li>
	
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>换车记录</span></div>
    
    <ul class="forminfo">
	<form method='post' action=''>
    <li><label>申请人名字</label><input name="replace_name" type="text" class="dfinput" value="<?php echo ($arr["repair_name"]); ?>"/></li>
    <li><input name="repair_id" type="hidden" class="dfinput" value="<?php echo ($arr["repair_id"]); ?>"/></li>
    <li>
		<label>车牌号</label>
		<select name='repair_number'>
			<?php foreach($car as $v){ if($arr['repair_carid'] == $v['car_id']){ echo "<option value='".$v['car_id']."' selected>". $v['car_number']."</option>"; }else{ echo "<option value='".$v['car_id']."'>". $v['car_number']."</option>"; } } ?>
		</select>
	</li>
    
    <li><label>换车原因</label><input name="replace_reason" type="text" class="dfinput" value="<?php echo ($arr["repair_desc"]); ?>"/></li>
	<li><label>状态</label>
		<select name='status'>
			<?php foreach($car_status as $s){ ?>
				<option value="<?php echo $s['repair_statusid'];?>"><?php echo $s['repair_statusname'];?></option>
			<?php } ?>
		</select>
	</li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
	</ul>
    
    
    </div>
	<script>
		$(function(){
			$('.btn').click(function(){
				
			})
		})
	</script>

</body>

</html>