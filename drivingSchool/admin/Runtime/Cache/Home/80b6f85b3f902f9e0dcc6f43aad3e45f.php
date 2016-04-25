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
    <li><a href="/index.php/Home/Service/getrepaircar">换车记录</a></li>
    <li><a href="#">修改换车记录</a></li>
	
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>换车记录</span></div>
    
    <ul class="forminfo">
	<form method='post' action=''>
    <li><label>申请人名字</label><input name="replace_name" type="text" class="dfinput" value="<?php echo ($arr["staff_name"]); ?>"/></li>
    <li><input name="replace_id" type="hidden" class="dfinput" value="<?php echo ($arr["replace_id"]); ?>"/></li>
    <li>
		<label>更换前车牌号</label>
		<select name='replace_number_before'>
			<?php foreach($data as $v){ if($arr['replace_number_before'] == $v['car_id']){ echo "<option value='".$v['car_id']."' selected>". $v['car_number']."</option>"; }else{ echo "<option value='".$v['car_id']."'>". $v['car_number']."</option>"; } } ?>
		</select>
	</li>
    <li>
		<label>更换后车牌号</label>
		<select name='replace_number_after'>
			<?php foreach($data as $v){ if($arr['replace_number_after'] == $v['car_id']){ echo "<option value='".$v['car_id']."' selected>". $v['car_number']."</option>"; }else{ echo "<option value='".$v['car_id']."'>". $v['car_number']."</option>"; } } ?>
		</select>
	</li>
    <li><label>换车原因</label><input name="replace_reason" type="text" class="dfinput" value="<?php echo ($arr["replace_reason"]); ?>"/></li>
	<li><label>状态</label>
		<select name='status'>
			<?php foreach($status as $s){ ?>
				<option value="<?php echo $s['status_id'];?>"><?php echo $s['status_name'];?></option>
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