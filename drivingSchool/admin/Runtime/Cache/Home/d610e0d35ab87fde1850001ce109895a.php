<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".click").click(function(){
                $(".tip").fadeIn(200);
            });

            $(".tiptop a").click(function(){
                $(".tip").fadeOut(200);
            });

            $(".sure").click(function(){
                $(".tip").fadeOut(100);
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>
    


</head>


<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">个人中心</a></li>
        <li><a href="#">请假管理</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">
    <form action="/index.php/Home/Personal/leavesearch" method="post">
	<select name="year">
    <?php if($y == 1 ): ?><option value="<?php echo $year?>"><?php echo $year?>年</option>    <?php else: ?> <option value="">---请选择---</option><?php endif; ?>
	
		<?php foreach($arr as $v){?>
		<option value="<?php echo $v['year'];?>"><?php echo $v["year"];?>年</option>
		<?php }?>
	</select>
	</a>
&nbsp;&nbsp;
	<select name="month">
		  <?php if($m == 1 ): ?><option value="<?php echo $month?>"><?php echo $month?>月</option>    <?php else: ?> <option value="">---请选择---</option><?php endif; ?>
		<?php foreach($arr1 as $vo){?>
		<option value="<?php echo $vo['month'];?>"><?php echo $vo["month"];?>月</option>
		<?php }?>
	</select>
    <input type="submit" value="搜索">
    </form>

        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Personal/iwantgolist" style="cursor:pointer" title="我要请假">我要请假</a></li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>请假时间</th>
            <th>销假时间</th>
            <th>请假类型</th>
            <th>请假天数</th>
            <th>请假原因</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($arr2 as $vi){?>
        <tr>
            <td><?php echo $vi['leave_starttime'];?></td>
            <td><?php echo $vi['leave_endtime'];?></td>
            <td><?php echo $vi['leave_type'];?></td>
            <td><?php echo $vi['leave_days'];?></td>
            <td><?php echo $vi['leave_desc'];?></td>
            <td>
            	<?php if($vi['leave_status'] == 0): ?>审批中
            	<?php elseif($vi['leave_status'] == 1): ?>已撤销
            	<?php elseif($vi['leave_status'] == 2): ?>已审批
            	<?php elseif($vi['leave_status'] == 3): ?>已拒绝
            	<?php else: ?> 已销假<?php endif; ?>
            </td>
            <td>
            	<?php if($vi['leave_status'] == 0): ?><a href="/index.php/Home/Personal/revoke" class="tablelink" title="撤销">撤销</a>
            	<?php else: ?> <a href="/index.php/Home/Personal/leavelookidsee/id/<?php echo $vi['leave_id']?>" class="tablelink" title="查看">查看</a><?php endif; ?>
            </td>
        </tr>
        <?php }?>

        
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"><?php echo ($page); ?></li>
           <!-- <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem current"><a href="javascript:;">2</a></li>
            <li class="paginItem"><a href="javascript:;">3</a></li>
            <li class="paginItem"><a href="javascript:;">4</a></li>
            <li class="paginItem"><a href="javascript:;">5</a></li>
            <li class="paginItem more"><a href="javascript:;">...</a></li>
            <li class="paginItem"><a href="javascript:;">10</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>-->
        </ul>
    </div>


   

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</body>

</html>