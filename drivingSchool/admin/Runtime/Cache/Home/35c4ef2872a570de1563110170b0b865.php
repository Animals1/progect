<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
    <link href="/Public/admin/css/common.css" rel="stylesheet" type="text/css" />

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
                window.location.href="/index.php/Home/Finance/addexpen";
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>
    <script src="/Public/laydate/laydate.js"></script>
    <style>
        h2{line-height:30px; font-size:20px;}
        a,a:hover{ text-decoration:none;}
        pre{font-family:'微软雅黑'}
        .box{width:970px; padding:10px 20px; background-color:#fff; margin:10px auto;}
        .box a{padding-right:20px;}
    </style>

</head>


<body style="background:#FFF8ED;">
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><span><img src="/Public/admin/images/t01.png" /></span>添加</li>
            <li><span><img src="/Public/admin/images/t04.png" /></span>统计</li>
        </ul>

        <form action="/index.php/Home/Finance/search3" method="post">
            <ul class="toolbar" style="margin-left: 180px;">
                <li>
                    经手人<input style="margin-bottom:2px;margin-left: 10px; width: 100px;height: 20px;" type="text" name="staff_name">
                </li>
                <li>
                    日期<input class="laydate-icon" onclick="laydate()" style="margin-bottom:2px;margin-left: 10px; width: 100px;height: 20px;" type="text" name="expense_time">
                </li>
                <li>
                    <input style="margin-bottom:2px;margin-left: 10px; width: 50px;height: 25px;" type="submit" value="搜索">
                </li>
            </ul>
        </form>

        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>登记支出</li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>经手人<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>费用发生日期</th>
            <th>费用类型</th>
            <th>金额（元）</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $v){?>
        <tr>
            <td><?php echo $v['staff_name']; ?></td>
            <td><?php echo $v['expense_time']; ?></td>
            <td><?php echo $v['status_name']; ?></td>
            <td><?php echo $v['expense_money']; ?></td>
            <td><?php echo $v['expense_desc']; ?></td>
            <td><a href="/index.php/Home/Finance/selexpen?id=<?php echo $v['expense_id']; ?>" class="tablelink">查看</a>     <a href="/index.php/Home/Finance/delexpen?id=<?php echo $v['expense_id']; ?>" class="tablelink"> 删除</a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <div class="list-page">
            <?php echo ($page); ?>
        </div>
    </div>


    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否确认添加数据 ？</p>
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