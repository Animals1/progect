<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="/progect/drivingSchool/Public/text/javascript">

</script> 


</head>


<body style="background:#FFF8ED;">
   <div class="rightinfo">
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>预约教练姓名<i class="sort"><img src="/progect/drivingSchool/Public/admin/images/px.gif" /></i></th>
            <th>预约课程</th>
            <th>预约时刻</th>
            <th>预约时间</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach ($list as $v) { ?>
        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td><?php echo $v['staff_name']; ?></td>
            <td><?php echo $v['class_name']; ?></td>
            <td><?php echo $v['time_section']; ?></td>
            <td><?php echo $v['add_time']; ?></td>
            <td><?php  if ($v['stu_order_status']==0 ) { ?>
               已取消 
            <?php  }else{ ?> 
            预约中
            <?php } ?></td>
        </tr>
        <?php  } ?>
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <?php echo ($page); ?>
            <!-- <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;"><?php echo ($page); ?></a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li> -->
        </ul>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/progect/drivingSchool/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否确认对信息的修改 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>

</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');

</script>

</body>

</html>