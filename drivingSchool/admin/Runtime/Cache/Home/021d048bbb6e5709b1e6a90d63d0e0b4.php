<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>


</head>


<body style="background:#FFF8ED;">
<div class="rightinfo">
 <table class="tablelist">
     <form action="/index.php/Home/Staff/sasearch" method="post">
            <input type="hidden" name="id" value="1" />
            员工编号：<input name="sn" type="text"  />
            员工姓名：<input name="name" type="text"  />
            <input type="submit"  value="查询" class="btn"/>
     </form>
     <tr>
         <th rowspan="2">员工编号</th>
         <th rowspan="2">姓名</th>
         <th colspan="12"><center>月份</center></th>
     </tr>
     <tr>
         <?php if(is_array($month)): foreach($month as $key=>$mv): ?><th><?php echo ($mv["month"]); ?>月</th><?php endforeach; endif; ?>
     </tr>
     <?php if(is_array($salary)): foreach($salary as $key=>$vo): ?><tr>
       <td><?php echo ($vo["staff_sn"]); ?></td>
       <td><?php echo ($vo["staff_name"]); ?></td>
       <?php for($i=1;$i<=count($vo['month']);$i++){ ?>
           <td><?php echo $vo['month'][$i][0]['num']?$vo['month'][$i][0]['num'].'小时':""?></td>
        <?php } ?>     
      
       </tr><?php endforeach; endif; ?>
  </table>
</div>

</body>

</html>
<script>
</script>