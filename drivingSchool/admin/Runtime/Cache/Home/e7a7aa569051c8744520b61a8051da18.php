<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="/Public/text/javascript">
    </script>

    <style type="text/css">
        table.imagetable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }
        table.imagetable th {
            background:#F99331 url('cell-blue.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #EB5409;
        }
        table.imagetable td {
            background:#dcddc0 url('cell-grey.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #999999;
        }

        select{
            width: 100px;
            text-align: center;
        }
    </style>
    <script src="/Public/laydate/laydate.js"></script>
    <style>
        html{background-color:#E3E3E3; font-size:14px; color:#000; font-family:'微软雅黑'}
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
            <li class="click"><a href="/index.php/Home/Finance/charge"><span><img src="/Public/admin/images/t02.png" /></span>列表</a></li>

            <li><a href="/index.php/Home/Finance/income"><span><img src="/Public/admin/images/t04.png" /></span>统计</a></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>收费</li>
        </ul>

    </div>

    <form action="doup" method="post">
        <table class="imagetable" >
            <tr>
                <th>学员姓名:</th>
                <td>
                    <input type="text" name="stu_id" value="<?php echo $up['stu_name']; ?>">
                </td>
            </tr>
            <tr>
                <th>学员编号:</th>
                <td>
                    <input type="text" name="stu_sn" value="<?php echo $up['stu_sn']; ?>">
                </td>
            </tr>
            <tr>
                <th>费用类型:</th>
                <td>
                    <input type="text" name="money_type_id" value="<?php echo $up['money_name']; ?>">
                </td>
            </tr>
            <tr>
                <th>收费日期:</th>
                <td>
                    <input class="laydate-icon" onclick="laydate()" name="charge_time" value="<?php echo $up['charge_time']; ?>"><br /><br />
                </td>
            </tr>
            <tr>
                <th>支付方式:</th>
                <td>
                    <input type="text" name="payment_id" value="<?php echo $up['payment_name']; ?>">
                </td>
            </tr>
            <tr>
                <th>收费金额:</th>
                <td>
                    <input type="text" name="charge_money" value="<?php echo $up['charge_money']; ?>">元
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>




</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>


</body>

</html>