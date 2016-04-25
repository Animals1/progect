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
         <th colspan="<?php echo ($wage[0]['count']); ?>"><center>应发工资</center></th>
         <th colspan="<?php echo ($wage[1]['count']); ?>"><center>应扣工资</center></th>
         <th rowspan="2">实发工资</th>
         <th rowspan="2">状态</th>
     </tr>
     <tr>
         <?php
 for ($i=0; $i < ($wage[0]['count'] - 1); $i++) { ?>
                <th><?php echo $wage[0][$i]['name'];?></th>
        <?php } ?>
         <th>合计</th>
         <?php
 for ($i=0; $i < ($wage[1]['count'] - 1); $i++) { ?>
                <th><?php echo $wage[1][$i]['name'];?></th>
        <?php } ?>
         <th>合计</th>
     </tr>
     <?php if(is_array($wagesel)): foreach($wagesel as $key=>$vo): ?><tr>
         <td><?php echo ($vo["role_name"]); ?></td>
         <td><?php echo ($vo["staff_sn"]); ?></td>
         <td><?php echo ($vo["staff_name"]); ?></td>
         <td><?php echo ($vo["num"]); ?></td>
         <?php
 for ($i=0; $i < ($wage[0]['count'] - 1); $i++) { ?>
                <td><?php echo $wage[0][$i]['in_out_money'];?></td>
        <?php } ?>
        <td><?php echo $wage[0]['sum'];?></td>
        <?php
 for ($i=0; $i < ($wage[1]['count'] - 1); $i++) { ?>
                <td><?php echo $wage[1][$i]['in_out_money'];?></td>
        <?php } ?>
        <td><?php echo $wage[1]['sum'];?></td>
        <td><?php echo $wage['sum'];?></td>
     </tr><?php endforeach; endif; ?>
  </table>
</div>

</body>

</html>