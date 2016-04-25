<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>


</head>


<body style="background:#FFF8ED;">
<div class="rightinfo">
 <table class="tablelist">
<!--      <form action="/progect/drivingSchool/index.php/Home/Staff/sasearch" method="post">
            <input type="hidden" name="id" value="1" />
            员工编号：
            <?php if($search["sn"] != ''): ?><input name="sn" type="text" value="<?php echo ($search["sn"]); ?>" />
            <?php else: ?>
              <input name="sn" type="text" /><?php endif; ?>
            员工姓名：
            <?php if($search["name"] != ''): ?><input name="name" type="text" value="<?php echo ($search["name"]); ?>" />
            <?php else: ?>
              <input name="name" type="text" /><?php endif; ?>
            <input type="submit"  value="查询" class="btn"/>
     </form> -->
     <tr>
         <th rowspan="2">岗位</th>
         <th rowspan="2">员工编号</th>
         <th rowspan="2">姓名</th>
         <th rowspan="2">出勤天数</th>
         <th colspan="($wage[0]['count'] + 1)"><center>应发工资</center></th>
         <th colspan="($wage[1]['count'] + 1)"><center>应扣工资</center></th>
         <th rowspan="2">实发工资</th>
         <th rowspan="2">状态</th>
     </tr>
     <tr>
         <?php if(is_array($wage[0])): foreach($wage[0] as $key=>$vo): ?><th><?php echo ($vo["name"]); ?></th><?php endforeach; endif; ?>
         <!-- <?php if(is_array($wage[1])): foreach($wage[1] as $key=>$v): ?><th><?php echo ($v["name"]); ?></th><?php endforeach; endif; ?> -->
     </tr>
  </table>
</div>

</body>

</html>