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
        </table>
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