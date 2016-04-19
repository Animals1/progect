<<<<<<< HEAD
<?php if (!defined('THINK_PATH')) exit(); header("Content-type:text/html;charset=utf-8"); ?>
<!DOCTYPE HTML>
<html>
<body>
<h5>当前功能-----个人信息</h5>
=======
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<body>
<h5>当前功能>个人信息</h5>
>>>>>>> dafeba4578440983dfee69bb7489b76e10ec06c5
	<h5>基本信息</h5><hr/>
	<div style="float:left">
	<table>
		<tr>
			<td>
				姓名：<?php echo $arr["staff_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;性别：<?php if($arr['staff_sex'] == 1 ): ?>男   <?php else: ?> 女<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;民族：<?php echo $arr["staff_nation"];?>
			</td>
		</tr>
		<tr>
			<td>
				出生年月：<?php echo date('Y年m月',$arr["staff_birthplace"]);?>
			</td>
		</tr>
		<tr>
			<td>
				身份证号：<?php echo $arr["staff_idcard"];?>
			</td>
		</tr>
		<tr>
			<td>
				籍贯：<?php echo $arr["staff_account"];?>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
				职位：<?php echo $arr["role_name"];?>
			</td>
		</tr>
		<tr>
			<td>
				入职年限：<?php echo date('Y年m月d日',$arr["staff_start_year"]);?>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				联系地址：<?php echo $arr["staff_curaddress"];?>
			</td>
			<td>&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Personal/showupdatefield/field/1" style=" text-decoration: none;"><font color="red" size="2">修改</font></a></td>
		</tr>
		<tr>
			<td>
				手机号：<?php echo $arr["staff_tel"];?>
			</td>
			<td>&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Personal/showupdatefield/field/2" style=" text-decoration: none;"><font color="red" size="2">修改</font></a></td>
		</tr>
		<tr>
			<td>
				邮箱：<?php echo $arr["staff_email"];?>
			</td>
			<td>&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Personal/showupdatefield/field/3" style=" text-decoration: none;"><font color="red" size="2">修改</font></a></td>
		</tr>
	</table>
	</div>
	
	<div style="margin-left:500px;">
<<<<<<< HEAD
		<img src="/Public/admin/<?php echo $arr['staff_photo'];?>" width="100" height="100">
=======
		<img src="/Public/admin/<?php echo $arr['staff_photo'];?>" width="100" height="100" style="cursor:pointer" title="照片">
	</div>


	<div>

		<?php
 if($arr['staff_photo']==''||$arr["staff_email"]==''||$arr["staff_tel"]==''||$arr["staff_curaddress"]==''||$arr["staff_start_year"]==''){ echo "<font size='2' color='red'>您的信息不完整，请尽快去服务台办理相关验证，否则将会影响您的操作！</font>"; } ?>

>>>>>>> dafeba4578440983dfee69bb7489b76e10ec06c5
	</div>
</body>
</html>