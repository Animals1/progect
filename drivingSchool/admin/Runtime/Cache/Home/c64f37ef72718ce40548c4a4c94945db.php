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
    <li><a href="#">换车记录</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
		<ul class="forminfo">
		<li>
			<?php  ?>
        
        </ul>
			<label>选择条件&nbsp;&nbsp;:</label>
			<select class='condition'>
			<?php if($status == ''){ echo "<option value='' selected>请选择</option><option value='0'>审核未通过</option><option value='1'>审核通过</option>"; } if($status == '0'){ echo "<option value=''>请选择</option><option value='0' selected>审核未通过</option><option value='1'>审核通过</option>"; } if($status == '1'){ echo "<option value=''>请选择</option><option value='0'>审核未通过</option><option value='1' selected>审核通过</option>"; } ?>
				
				
				
			</select>
		</li>
		</ul>
        <ul class="toolbar1">
		<?php if($type == '1'){ echo ""; } else{ echo "<li><span><img src='/Public/admin/images/t05.png' /></span><span id='change' style='cursor:pointer' >我要换车</span></li>"; } ?>
        
        </ul>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>申请人名字<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
        <th>申请时间</th>
        <th>更换前车牌号</th>
        <th>更换后车牌号</th>
        <th>换车原因</th>
        <th>审核状态（管理员才有权限修改）</th>
		<th>处理人</th>
        
		<?php if($type == '1'){ echo "<th>操作</th>"; } else{ } ?>
        
        </tr>
        </thead>
		
        <tbody id='sui'>
	
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><tr>
        <td><?php echo ($vo["staff_name"]); ?></td>
        <td><?php echo date("Y-m-d",$vo['replace_time']);?></td>
        <td><?php echo ($vo["car_number"]); ?></td>
		
        <td><?php echo ($vo["replace_number_after_num"]); ?></td>
		
        <td><?php echo ($vo["replace_reason"]); ?></td>
        <td>
		<?php  if($vo['replace_status'] == '0'){ echo "审核未通过<span style='cursor:pointer'>×</span>"; } else { echo "审核通过<span style='cursor:pointer'>√</span>"; } ?>
		</td>
		<td><span  class='deal_name'><?php echo ($vo['deal_name']); ?></span></td>
        
		<?php if($type == '1'){ echo "<td><a href='javascript:void(0);' class='tablelink' value='".$vo['replace_id']."' type='update'>修改</a> |  <a href='javascript:void(0);' class='tablelink' value='".$vo['replace_id']."' type='delete'> 删除</a></td>"; } else{ } ?>
        
        </tr><?php endforeach; endif; ?>

        </tbody>
		
    </table>
    
   
    <div class="pagin">
    	<div id="message"><?php echo ($page); ?></div>
        <ul class="paginList">
        </ul>
    </div>
    
    </div>
    
    
	<script>
	$(function(){
		//管理员修改，删除
		$('.tablelink').click(function(){
			$that = $(this);
			var type = $(this).attr('type');
			var value = $(this).attr('value');
			if(type == "update"){
				location.href="/index.php/Home/Service/updaterepaircar/id/"+value;
			}
			else if(type == "delete"){
				if(confirm('你确定要删除吗？')){
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
				}
				else
				{
					return false;
				}
				
			}else
			{
				return false;
			}
		})
		//教练添加换车申请
		$('#change').click(function(){
			location.href="/index.php/Home/Service/addrepaircar";
		})
		
		//筛选条件，审核未审核
		$('.condition').change(function(){
			var value = $(this).val();
			location.href = "/index.php/Home/Service/searchcondition/value/"+value;
			
		})
	})
	</script>
</body>

</html>