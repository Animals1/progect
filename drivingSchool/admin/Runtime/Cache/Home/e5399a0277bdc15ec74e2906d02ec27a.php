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
<table class="tablelist" border="1" cellspacing="0">
 <tr>
     <th><a href="javascript:void(0)" class="sear"><span value="1">教练员</span></a></th>
     <th><a href="javascript:void(0)" class="sear"><span value="2">其他员工</span></a></th>
 </tr>
</table>
<div id="coach" style="display: block">
 <table class="tablelist">
     <form action="/progect/drivingSchool/index.php/Home/Staff/search" method="post">
            <input type="hidden" name="id" value="1" />
            编号：<input name="sn" type="text"  />
            姓名：<input name="name" type="text"  />
            身份证号：<input name="idcard" type="text"  />
            手机号：<input name="tel" type="text"  />
            <input type="submit"  value="查询" class="btn"/>
     </form>
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
                  <td>
                      <?php if($vo["staff_sex"] == 1 ): ?>男
                      <?php else: ?>
                          女<?php endif; ?>
                  </td>
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
        </table>
    </div>
    <div id="staff" style="display: none">
    <table class="tablelist">
        <form action="/progect/drivingSchool/index.php/Home/Staff/search" method="post">
            <input type="hidden" name="id" value="2" />        
            编号：<input name="sn" type="text"  />
            姓名：<input name="name" type="text"  />
            身份证号：<input name="idcard" type="text"  />
            手机号：<input name="tel" type="text"  />
            <input type="submit"  value="查询" class="btn"/>
        </form>
         <tr class="staff">
             <th>序号</th>
             <th>编号</th>
             <th>姓名</th>
             <th>身份证号</th>
             <th>出生年月</th>
             <th>性别</th>
             <th>岗位</th>
             <th>合同结束日期</th>
             <th>联系电话</th>
             <th>操作</th>
         </tr>
               <?php if(is_array($staff)): foreach($staff as $key=>$v): ?><tr>
                      <td><?php echo ($v["staff_id"]); ?></td>
                      <td><?php echo ($v["staff_sn"]); ?></td>
                      <td><?php echo ($v["staff_name"]); ?></td>
                      <td><?php echo ($v["staff_idcard"]); ?></td>
                      <td><?php echo ($v["staff_year"]); ?></td>
                      <td>
                          <?php if($v["staff_sex"] == 1 ): ?>男
                          <?php else: ?>
                              女<?php endif; ?>
                      </td>
                      <td><?php echo ($v["role_name"]); ?></td>
                      <td><?php echo ($v["staff_end_year"]); ?></td>
                      <td><?php echo ($v["staff_tel"]); ?></td>
                      <td>
                          <?php if($v["staff_job"] == 1 ): ?>删除
                          <?php else: ?>
                              已离职<?php endif; ?>
                      </td>
              
                  </tr><?php endforeach; endif; ?>
    </table>
</div>
</div>

</body>

</html>
<script>
    $('.sear').click(function(){
        var id = $(this).parent().find('span').attr('value');
        if (id == '1') {
            $('#staff').css('display','none')
            $('#coach').css('display','block')
        }else{
            $('#staff').css('display','block')
            $('#coach').css('display','none')
        }
    });
        
</script>