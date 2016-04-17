<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if($field == 1): ?><p>您的联系地址为：<?php echo $arr[0]["staff_curaddress"];?></p>
	<p>您将要修改为：
		<form action="/index.php/Home/Personal/updatefield" method="post">
			<input type="hidden" name="field" value="1">
			<input type="text" size="30" placeholder="请输入新的联系地址" name="staff_curaddress"><input type="submit" value="修改">
		</form>
	</p>
	<?php elseif($field == 2): ?>
	<p>您的手机号为：<?php echo $arr[0]["staff_tel"];?></p>
	<p>您将要修改为：
		<form action="/index.php/Home/Personal/updatefield" method="post">
			<input type="hidden" name="field" value="2">
			<input type="text" size="30" placeholder="请输入新的手机号" name="staff_tel"><input type="submit" value="修改">
		</form>
	</p>
	<?php else: ?> 
	<p>您的邮箱为：<?php echo $arr[0]["staff_email"];?></p>
	<p>您将要修改为：
		<form action="/index.php/Home/Personal/updatefield" method="post">
			<input type="hidden" name="field" value="3">
			<input type="text" size="30" placeholder="请输入新的邮箱" name="staff_email"><input type="submit" value="修改">
		</form>
	</p><?php endif; ?>
</body>
</html>