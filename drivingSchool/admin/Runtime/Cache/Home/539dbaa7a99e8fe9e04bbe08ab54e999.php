<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

    <script type="/Public/text/javascript"></script> 
   <style>
		.aa{font-size:24px}
   </style>

</head>


<body style="background:#FFF8ED;">
<span class="aa">基本信息</span>
<table class="tablelist">
        <tr>
          <td rowspan="4"><img src="" width="200px" height="200px" alt="照片" /></td>
          <td>姓名：<?php echo $arr['stu_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php  if ($arr['stu_sex']==1) {echo "男"; }else{echo "女";} ?></td>
          <td></td>
          <td></td>
          <td align="center" >报名时间：<?php echo $arr['stu_time']; ?></td>
        </tr>
        <tr>
          <td>身份证号：<?php echo $arr['stu_idcard']; ?></td>
          <td>电话：<?php echo $arr['stu_tel']; ?></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>户口所在地：<?php echo $arr['stu_birthplace']; ?></td>
          <td>现居住地：<?php echo $arr['stu_currentplace']; ?></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>邮箱：<?php echo $arr['stu_email']; ?></td>
          <td>所在驾校：宏强驾校</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td><?php echo $arr['stu_sn']; ?></td>
          <td>报考类型：<?php echo $arr['cert_level']; ?></td>
          <td>报考课程：<?php echo $arr['class_name']; ?></td>
          <td></td>
          <td align="center"><?php echo $arr['stu_status_name']; ?></td>
        </tr>
    </table>
    
    <span class="aa">考证进度</span>
      <div class="rightinfo">
    <table class="tablelist">
        <thead>
        <tr>
            <th>报名驾校<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>是否受理</th>
            <th>科目一是否通过</th>
            <th>科目二是否通过</th>
            <th>科目三是否通过</th>
            <th>科目四是否通过</th>
            <th>我的驾照是否通过</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>已完成</td>
            <td><?php if ($progress['progress_isaccept']==1 ) { echo "已完成"; }else if($progress['progress_isaccept']==''){echo "";}else{echo "未完成";} ?></td>
            <td><?php if ($progress['test_one']==1 ) { echo "已完成"; }else if($progress['test_one']==''){echo "";}else{echo "未完成";} ?></td>
            <td><?php if ($progress['test_two']==1 ) { echo "已完成"; }else if($progress['test_two']==''){echo "";}else{echo "未完成";} ?></td>
            <td><?php if ($progress['test_threee']==1 ) { echo "已完成"; }else if($progress['test_threee']==''){echo "";}else{echo "未完成";} ?></td>
            <td><?php if ($progress['test_four']==1 ) { echo "已完成"; }else if($progress['test_four']==''){echo "";}else{echo "未完成";} ?></td>
            <td><?php if ($progress['mylicense']==1 ) { echo "已完成"; }else if($progress['mylicense']==''){echo "";}else{echo "未完成";} ?></td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>