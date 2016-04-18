<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="/progect/drivingSchool/Public/text/javascript">

    <script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>


</head>


<body style="background:#FFF8ED;">
<div class="rightinfo">
<table class="tablelist" border="1" cellspacing="0">
 <tr>
     <th><a href="#">教练员</a></th>
     <th><a href="#">其他员工</a></th>
 </tr>
</table>

 <table class="tablelist">
 <div id="coach">
     <thead>
     <tr>
         <th>序号</th>
         <th>编号</th>
         <th>姓名</th>
         <th>身份证号</th>
         <th>出生年月</th>
         <th>性别</th>
         <th>教练证编号</th>
         <th>教练证有效期</th>
         <th>合同结束日期</th>
         <th>联系电话</th>
         <th>操作</th>
     </tr>
     </thead> 
           <?php if(is_array($coach)): foreach($coach as $key=>$vo): ?><tr>
                  <td><?php echo ($vo["staff_id"]); ?></td>
                  <td><?php echo ($vo["staff_sn"]); ?></td>
                  <td><?php echo ($vo["staff_name"]); ?></td>
                  <td><?php echo ($vo["staff_idcard"]); ?></td>
                  <td><?php echo ($vo["staff_year"]); ?></td>
                  <td><?php echo ($vo["staff_sex"]); ?></td>
                  <td><?php echo ($vo["coach_sn"]); ?></td>
                  <td><?php echo ($vo["coach_validity"]); ?></td>
                  <td><?php echo ($vo["staff_end_year"]); ?></td>
                  <td><?php echo ($vo["staff_tel"]); ?></td>
                  <td>
                      <?php if($vo["staff_job"] == 1 ): ?>删除
                      <?php else: ?>
                          已离职<?php endif; ?>
                  </td>
          
              </tr><?php endforeach; endif; ?>
                  </div>
        <div id="staff"></div>
    </table>

</div>

</body>

</html>