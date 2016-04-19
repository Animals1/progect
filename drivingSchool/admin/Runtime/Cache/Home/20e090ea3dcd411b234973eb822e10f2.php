<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="/Public/text/javascript">
    </script>


    </head>

<body style="background:#FFF8ED;">
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><a href="/index.php/Home/Finance/addcharge"><span><img src="/Public/admin/images/t01.png" /></span>添加</a></li>
            <li><span><img src="/Public/admin/images/t03.png" /></span>删除</li>
            <li><a href="/index.php/Home/Finance/income"><span><img src="/Public/admin/images/t04.png" /></span>统计</a></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>收费</li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
            <tr>
                <th><input name="" type="checkbox" value="" checked="checked"/></th>
                <th>缴费学员<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
                <th>学员编号</th>
                <th>收费日期</th>
                <th>费用类型</th>
                <th>金额</th>
                <th>支付操作</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $v){?>
            <tr>
                <td><input name="" type="checkbox" value="" /></td>
                <td><?php echo $v['stu_name']; ?></td>
                <td><?php echo $v['stu_sn']; ?></td>
                <td><?php echo $v['charge_time']; ?></td>
                <td><?php echo $v['money_name']; ?></td>
                <td><?php echo $v['charge_money']; ?></td>
                <td><?php echo $v['payment_name']; ?></td>
                <td><a href="#" class="tablelink">修改</a>     <a href="/index.php/Home/Finance/delcharge?id=<?php echo $v['charge_id']; ?>" class="tablelink"> 删除</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <div class="paginList">
            <?php echo ($page); ?>
        </div>
    </div
    >

</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>


</body>

            </html>