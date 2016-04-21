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
		</ul>
			<label>选择条件&nbsp;&nbsp;:</label>
			<select class='condition'>
			<?php if($status == ''){ echo "<option value='' selected>请选择</option><option value='1'>审核通过</option><option value='2'>审核未通过</option>"; } if($status == '1'){ echo "<option value=''>请选择</option><option value='1' selected>审核通过</option><option value='2'>审核未通过</option>"; } if($status == '2'){ echo "<option value=''>请选择</option><option value='1'>审核通过</option><option value='2' selected>审核未通过</option>"; } ?>
				
				
				
			</select>
		</li>
		</ul>
        <ul class="toolbar1">
<<<<<<< HEAD
        <li><span><img src="/Public/admin/images/t05.png" /></span>我要修车</li>
        </ul>
    
=======
		<?php if($type == '1'){ echo ""; } else{ echo "<li><span><img src='/eleven/progect/drivingSchool/Public/admin/images/t05.png' /></span><span id='change' style='cursor:pointer' >我要换车</span></li>"; } ?>
		</ul>
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
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
		<?php
 if($type == 1){ echo "<th>操作</th>"; } else { } ?>
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
		<td>
		<?php
 if($type == 1){ echo "<a href='javascript:void(0);' class='tablelink' value='".$vo['repair_id']."' type='update'>修改</a> |
				<a href='javascript:void(0);' class='tablelink' value='".$vo['repair_id']."' type='delete'> 删除</a>"; } else { } ?>
        
		</td>
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
<<<<<<< HEAD
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
=======
				location.href="/eleven/progect/drivingSchool/index.php/Home/Service/updaterepair/id/"+value;
			}
			else if(type == "delete"){
				
				if(confirm('你确定要删除吗？')){
					url = "/eleven/progect/drivingSchool/index.php/Home/Service/delrepaircar"
					$.post(url,{'reapairid' : value},function(data){
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
				
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
			}else
			{
				return false;
			}
		})
		
		//教练添加维修申请
		$('#change').click(function(){
			location.href="/eleven/progect/drivingSchool/index.php/Home/Service/addrepair";
		})
		
		//筛选条件，审核未审核
		$('.condition').change(function(){
			var value = $(this).val();
			location.href = "/eleven/progect/drivingSchool/index.php/Home/Service/searchcondition/status/"+value;
			
		})
	})
	</script>
</body>

</html>