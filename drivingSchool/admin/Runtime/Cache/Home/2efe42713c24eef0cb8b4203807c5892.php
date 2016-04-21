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
    <li><a href="#">申请换车</a></li>
	
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>申请维修</span></div>
    
    <ul class="forminfo">
	<form method='post' action=''>
    <li>
		<label>要维修的车：</label>
		<select name='repair_car'>
			<?php foreach($car as $v){?>
				<option value='<?php echo $v['car_id'];?>'><?php echo $v['car_number'];?></option>
			<?php } ?>
		</select>
	</li>
    
    <li><label>换车原因</label><input name="replace_reason" type="text" class="dfinput"/></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="提交申请"/></li>
    </form>
	</ul>
    
    
    </div>
	

</body>

</html>