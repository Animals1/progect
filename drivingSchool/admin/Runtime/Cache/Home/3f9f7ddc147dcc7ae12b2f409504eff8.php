<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
    <link href="/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
    <link href="/Public/admin/css/common.css" rel="stylesheet" type="text/css" />

</head>


<body style="background:#FFF8ED;">
   <div class="rightinfo">
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>缴费日期<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>费用类型</th>
            <th>金额（元）</th>
            <th>支付方式</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach ($list as $v) { ?>
                <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>2016-01-01</td>
            <td><?php echo $v['money_name']; ?></td>
            <td><?php echo $v['charge_money']; ?></td>
            <td><?php echo $v['payment_name']; ?></td>
            </tr>
        <?php  } ?>
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php  echo $count; ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $p; ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <div class="list-page"><?php echo ($page); ?></div>
            <!-- <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li> -->
        </ul>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
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