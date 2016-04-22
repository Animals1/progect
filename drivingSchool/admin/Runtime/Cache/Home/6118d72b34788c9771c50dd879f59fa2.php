<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
     <form action="/progect/drivingSchool/index.php/Home/Staff/leasearch" method="post">
            <input type="hidden" name="id" value="1" />
            编号：
            <?php if($search["sn"] != ''): ?><input name="sn" type="text" value="<?php echo ($search["sn"]); ?>" />
            <?php else: ?>
              <input name="sn" type="text" /><?php endif; ?>
            姓名：
            <?php if($search["name"] != ''): ?><input name="name" type="text" value="<?php echo ($search["name"]); ?>" />
            <?php else: ?>
              <input name="name" type="text" /><?php endif; ?>
            请假时间：
            <?php if($search["starttime"] != ''): ?><input name="starttime" type="text" class="sang_Calender" value="<?php echo ($search["starttime"]); ?>" />
            <?php else: ?>
              <input name="starttime" type="text" class="sang_Calender" /><?php endif; ?>
            销假时间：
            <?php if($search["endtime"] != ''): ?><input name="endtime" type="text" class="sang_Calender" value="<?php echo ($search["endtime"]); ?>" />
            <?php else: ?>
              <input name="endtime" type="text" class="sang_Calender" /><?php endif; ?>
            <input type="submit"  value="查询" class="btn"/>
     </form>
     <thead>
     <tr>
         <th>员工姓名</th>
         <th>员工编号</th>
         <th>请假时间</th>
         <th>销假时间</th>
         <th>请假类型 </th>
         <th>请假天数</th>
         <th>请假原因</th>
         <th>状态</th>
     </tr>
     </thead> 
     <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
          <input type="hidden" id="leaveid" value="<?php echo ($vo["leave_id"]); ?>" />
         <td><span value="<?php echo ($vo["staff_name"]); ?>" id="name"><?php echo ($vo["staff_name"]); ?></span></td>
         <td><?php echo ($vo["staff_sn"]); ?></td>
         <td><?php echo ($vo["leave_starttime"]); ?></td>
         <td><?php echo ($vo["leave_endtime"]); ?></td>
         <td><?php echo ($vo["leave_type"]); ?></td>
         <td><?php echo ($vo["leave_days"]); ?></td>
         <td><?php echo ($vo["leave_desc"]); ?></td>
         <td>
           <?php if($vo["leave_status"] == 0): ?><a href="javascript:void(0)" class="status" value="2" >批假</a>
              <a href="javascript:void(0)" class="status" value="3" >拒绝</a>
           <?php elseif($vo["leave_status"] == 1): ?>
              已撤销
           <?php elseif($vo["leave_status"] == 2): ?>
              已批假
           <?php elseif($vo["leave_status"] == 3): ?>
              已拒绝
           <?php else: ?>
              已销假<?php endif; ?>
         </td>
       </tr><?php endforeach; endif; ?>
        </table>
</div>

</body>

</html>
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/datetime.js"></script>
<script>
    $('.status').click(function(){
        var sid = $(this).attr('value');
        var id = $("#leaveid").attr('value');
        // alert(id);
        var name = $('#name').attr('value');
        if (sid == '1') {
          if (confirm("你确定要给"+name+"批假吗？")) {
            location.href = "/progect/drivingSchool/index.php/Home/Staff/leavestatus/sid/"+sid+"/id/"+id;
          }else{
            return false;
          }
          
        }else{
          if (confirm("你确定要拒绝"+name+"批假吗？")) {
            location.href = "/progect/drivingSchool/index.php/Home/Staff/leavestatus/id/"+sid+"/id/"+id;
          }else{
            return false;
          }
        }
    });
</script>