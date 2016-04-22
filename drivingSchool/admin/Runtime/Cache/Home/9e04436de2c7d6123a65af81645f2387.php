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
    <script language="javascript">
        function changeColor(){
            var color="#f00|#0f0|#00f|#880|#808|#088|yellow|green|blue|gray";
            color=color.split("|");
            document.getElementById("blink").style.color=color[parseInt(Math.random() * color.length)];
        }
        setInterval("changeColor()",200);
    </script>
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
                window.location.href="/index.php/Home/Finance/expense";
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>
</head>

<body style="background:#FFF8ED;">
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><span><img src="/Public/admin/images/t02.png" /></span>列表</li>

            <li><a href="/index.php/Home/Finance/income"><span><img src="/Public/admin/images/t04.png" /></span>统计</a></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>支出</li>
        </ul>

    </div>
    <marquee><div id="blink" style="font-size: 16px;font-family: 新宋体 ">详情</div></marquee>
    <table class="imagetable" >
        <tr>
            <th>经手人:</th>
            <th>员工编号:</th>
            <th>经手人ID:</th>
            <th>出生年月:</th>
            <th>员工手机号:</th>
            <th>员工住址:</th>
            <th>员工邮箱:</th>
            <th>员工照片:</th>
            <th>入职岗位:</th>
            <th>费用发生日期:</th>
            <th>费用类型:</th>
            <th>备注:</th>
            <th>金额（元）:</th>
        </tr>
        <tr>
            <td>
                <?php echo $sel['staff_name'];?>
            </td>
            <td>
                <?php echo $sel['staff_sn']; ?>
            </td>
            <td>
                <?php echo $sel['staff_idcard']; ?>
            </td>
            <td>
                <?php echo $sel['staff_year']; ?>
            </td>
            <td>
                <?php echo $sel['staff_tel']; ?>
            </td>
            <td>
                <?php echo $sel['staff_curaddress']; ?>
            </td>
            <td>
                <?php echo $sel['staff_email']; ?>
            </td>
            <td>
                <img title="<?php echo $sel['staff_name']; ?>" style="width: 80px;height: 100px;" src="/Public/<?php echo $sel['staff_photo']; ?>" alt="<?php echo $sel['staff_name']; ?>">
            </td>
            <td>
                <?php echo $sel['role_name']; ?>
            </td>
            <td>
                <?php echo $sel['expense_time']; ?>
            </td>
            <td>
                <?php echo $sel['status_name']; ?>
            </td>
            <td>
                <?php echo $sel['expense_desc']; ?>
            </td>
            <td>
                <?php echo $sel['expense_money']; ?>&nbsp;元
            </td>
        </tr>
    </table>

    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否返回列表 ？</p>
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