<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<script language="javascript">
function changeColor(){
var color="#f00|#0f0|#00f|#880|#808|#088|yellow|green|blue|gray";
color=color.split("|");
document.getElementById("blink").style.color=color[parseInt(Math.random() * color.length)];
}
setInterval("changeColor()",200);
</script> 
</head>
<body>
	<h3>亲爱的<?php echo "<font color='blue'>".$_COOKIE['username']."</font>"?>您好！</h3>
	<p>
		<?php foreach($arr as $v) {?>
		   您于<?php echo "<font color='red'>".$v['leave_starttime']."</font>"?>由于<?php echo "<font color='red'>".$v['leave_desc']."</font>"?>原因，办理了<?php echo "<font color='red'>".$v['leave_type']."</font>"?>手续！
		<?php }?>
	</p>
	<p>
		<?php foreach($arr as $vi) {?>
		<?php if($vi['leave_status'] == 0): ?><div id="blink">手续目前状态为：审批中</div> 
            	<?php elseif($vi['leave_status'] == 1): ?><div id="blink">手续目前状态为：已撤销</div> 
            	<?php elseif($vi['leave_status'] == 2): ?><div id="blink">手续目前状态为：已审批</div> 
            	<?php elseif($vi['leave_status'] == 3): ?><div id="blink">手续目前状态为：已拒绝</div> 
            	<?php else: ?> <div id="blink">手续目前状态为：已销假</div><?php endif; ?>
		<?php }?>
	</p>
	<p><a href="/index.php/Home/Personal/personleave" style=" text-decoration: none;"><input type="button" value="返回上一页" style="cursor:pointer" title="返回上一页"></a></p>
</body>
</html>