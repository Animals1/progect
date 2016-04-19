<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="/Public/text/javascript">

</script> 
<style>
    ul li{
     float: left;
     overflow:hidden;
     margin-top:20px;
     list-style:none;

 }

 ul li a{
    display:block;
     height:30px;
     min-width:30px;
     text-align:center;
     font-size:14px;
     border:1px solid #d6d6d6;
     float:left;
     margin-left:10px;
     padding:3px 5px;
     line-height:30px;
     text-decoration:none;
     color:#666;
 }
 ul li a:hover,a.here{
     background:#FF4500;
     border-color:#FF4500;
     color:#FFF;
 }
  #select{font-size: 18px;margin: 30px}
  input{width: 150px;height: 30px;background-color:#dddddd;}
</style>

</head>


<body style="background:#FFF8ED;">
   <div class="rightinfo">
   <div id="select">
   <form action="/index.php/Home/Coach/query" method="post">
   	学员编号： <input type="text" name="stu_sn" />      学生姓名：  <input type="text" name="stu_name" />       
   	报名时间： <input type="date" name="stu_time" />     身份证号 ： <input type="text" name="stu_idcard" />       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="查找" />
   	</form>
   </div>
    <table class="tablelist">
        <thead>
        <tr>
            <th>序号<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>编号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>身份证号</th>
            <th>手机号</th>
            <th>报考课程</th>
            <th>报名时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($list as $v) { ?>
        <tr>
            <td><?php echo $v['stu_id']; ?></td>
            <td><?php echo $v['stu_sn']; ?></td>
            <td><?php echo $v['stu_name']; ?></td>
            <td><?php if($v['stu_sex']==1){echo "男";}else{echo "女";} ?></td>
            <td><?php echo $v['stu_idcard']; ?></td>
            <td><?php echo $v['stu_tel']; ?></td>
            <td><?php echo $v['class_name']; ?></td>
            <td><?php echo $v['stu_time']; ?></td>
            <td><?php echo $v['stu_status_name']; ?></td>
            <td><a href="/index.php/Home/Coach/studentinfo?user_id=<?php echo $v['user_id']; ?>">查看</a></td>
        </tr>
		<?php  } ?>
        </tbody>
    </table>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <ul>
                <li><?php echo ($page); ?></li>
            </ul> 
            <!-- <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;"><?php echo ($page); ?></a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li> -->
        </ul>
    </div>
</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');

</script>

</body>

</html>