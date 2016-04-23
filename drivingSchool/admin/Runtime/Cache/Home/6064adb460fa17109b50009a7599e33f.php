<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>收入报表饼状统计图</title>


    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/admin/js/jsapi.js"></script>
    <script type="text/javascript" src="/Public/admin/js/corechart.js"></script>
    <script type="text/javascript" src="/Public/admin/js/jquery.gvChart-1.0.1.min.js"></script>
    <script type="text/javascript" src="/Public/admin/js/jquery.ba-resize.min.js"></script>

    <script type="text/javascript">
        gvChartInit();
        $(document).ready(function(){
            $('#myTable5').gvChart({
                chartType: 'PieChart',
                gvSettings: {
                    vAxis: {title: 'No of players'},
                    hAxis: {title: 'Month'},
                    width: 600,
                    height: 350
                }
            });
        });
    </script>

    <script type="text/javascript">
        gvChartInit();
        $(document).ready(function(){
            $('#myTable1').gvChart({
                chartType: 'PieChart',
                gvSettings: {
                    vAxis: {title: 'No of players'},
                    hAxis: {title: 'Month'},
                    width: 600,
                    height: 350
                }
            });
        });
    </script>

</head>


<body>

<div style="width:600px;margin:0 auto;margin-top: 100px;">

    <table id='myTable5'>
        <caption>收入统计</caption>
        <thead>
        <tr>
            <th></th>
            <th>学费</th>
            <th>包车费</th>
            <th>欠费</th>
            <th>其他费</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th></th>
            <td><?php echo ($money); ?></td>
            <td><?php echo ($money1); ?></td>
            <td><?php echo ($money3); ?></td>
            <td><?php echo ($money2); ?></td>
        </tr>
        </tbody>
    </table>
    <a style="float: right;font-size:20px;text-decoration: none;" href="/index.php/Home/Finance/income">- -》<font color="orange">返回收入报表</font></a>
</div>

</body>
</html>