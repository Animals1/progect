<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	    <link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>
</head>
<body>
	 <table class="tablelist">
	 	<tr>
	 		<th>缴纳项目</th>
	 		<th>个人缴纳</th>
	 		<th>单位缴纳</th>
	 	</tr>
	 	<?php if(is_array($social)): foreach($social as $key=>$vo): ?><tr>
	 			<td><?php echo ($vo["social_name"]); ?></td>
	 			<td><input type="text" value="<?php echo ($vo["social_per_pay"]); ?>" class="dfinput" /></td>
	 			<td><input type="text" value="<?php echo ($vo["social_unit_pay"]); ?>" class="dfinput" /></td>
	 		</tr><?php endforeach; endif; ?>
	 </table>
</body>
</html>