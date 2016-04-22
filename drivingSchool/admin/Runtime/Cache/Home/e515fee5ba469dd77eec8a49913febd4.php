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
     <form action="/progect/drivingSchool/index.php/Home/Staff/hoursearch" method="post">
            在职情况：
              <select name="job" id="">
                <option value="1">在职</option>
                <option value="2">离职</option>
              </select>
            员工编号：
            <?php if($search["sn"] != ''): ?><input name="sn" type="text" value="<?php echo ($search["sn"]); ?>" />
            <?php else: ?>
              <input name="sn" type="text" /><?php endif; ?>
            员工姓名：
            <?php if($search["name"] != ''): ?><input name="name" type="text" value="<?php echo ($search["name"]); ?>" />
            <?php else: ?>
              <input name="name" type="text" /><?php endif; ?>
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
     <?php if(is_array($hours)): foreach($hours as $key=>$vo): ?><tr>
       <td><?php echo ($vo["staff_sn"]); ?></td>
       <td><?php echo ($vo["staff_name"]); ?></td>
       <?php for($i=1;$i<=count($vo['month']);$i++){ ?>
           <td>
              <?php if($vo['month'][$i][0]['hour'] == ''): else: ?>
                <?php echo ($vo['month'][$i][0]['hour']); ?>小时<?php endif; ?>
           </td>  
        <?php } ?>     
      
       </tr><?php endforeach; endif; ?>
  </table>
</div>

</body>

</html>
<script>
</script>