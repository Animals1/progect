<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <style>
        .wrapper{width:500px; height:300px; padding:20px; margin:0px auto}
    </style>
    <script src="/Public/admin/js/jquery-1-5-1-min.js" type="text/javascript"></script>
    <script src="/Public/admin/js/jquery-jqChart-min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="/Public/admin/js/excanvas.js"></script><![endif]-->
    <script lang="javascript" type="text/javascript">
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
    <script lang="javascript" type="text/javascript">
        $(document).ready(function () {
            $('#jqChart').jqChart({
                title: { text: '2016年油气添加统计' },
                axes: [
                    {
                        location: 'left',
                        minimum: 10,
                        maximum: 200,
                        interval: 10
                    }
                ],
                series: [
                    //Êý¾Ý1¿ªÊ¼
                    {
                        type: 'column',
                        title:'#93汽油',
                        data: [['1', 70], ['2', 40], ['3', 55], ['4', 50], ['5', 60], ['6', 40],['7', 40],['8', 40],['9', 40],['10', 40],['11', 40],['12', 40]]
                    },
                    //Êý¾Ý1½áÊø
                    //Êý¾Ý2
                    {
                        type: 'column',
                        title:'#95汽油',
                        data: [['1', 40], ['2', 50], ['3', 95], ['4', 55], ['5', 25], ['6', 45],['7',70],['8',30],['9',20],['10',30],['11',55],['12',55]]
                    },
                    //Êý¾Ý2½áÊø
                    //Êý¾Ý3
                    {
                        type: 'column',
                        title:'#97柴油',
                        data: [['1', 40], ['2', 50], ['3', 95], ['4', 55], ['5', 25], ['6', 45],['7',70],['8',30],['9',20],['10',30],['11',55],['12',55]]
                    },
                    //Êý¾Ý3½áÊø
                ]
            });
        });
    </script>


</head>


<body style="background:#FFF8ED;">

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">车辆管理</a></li>
        <li><a href="#">油气添加</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">


        <ul class="toolbar">
            <li class="click">年份:<select name="" id="">
                <option value="-1">请选择</option>
                <option value=""></option>
            </select></li>
            <li class="click">申请人:<input type="text" name="coach_name"></li>
            <li><span>车牌号:<input type="text" name="car_number"></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/gasadd">油气添加</a></li>
        </ul>




    </div>
    <div class="wrapper">

        <div>
            <div id="jqChart" style="width: 500px; height: 300px;"></div>
        </div>

    </div>
    <div id="myDIV">

    </div>
    <table class="tablelist">
        <thead>
        <tr>

            <th>申请人</th>
            <th>油气添加时间</th>
            <th>车牌号</th>
            <th>实际添加数量</th>
            <th>处理人</th>

        </tr>
        </thead>
        <tbody>
<?php if(is_array($record)): foreach($record as $key=>$gas): ?><tr>

            <td><?php echo ($gas["applicant_name"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$gas["gas_addtime"])); ?></td>
            <td><?php echo ($gas["car_number"]); ?></td>
            <td><?php echo ($gas["gas_volume"]); ?>L</td>
            <td><?php echo ($gas["deal_name"]); ?></td>
        </tr><?php endforeach; endif; ?>

        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem current"><a href="javascript:;">2</a></li>
            <li class="paginItem"><a href="javascript:;">3</a></li>
            <li class="paginItem"><a href="javascript:;">4</a></li>
            <li class="paginItem"><a href="javascript:;">5</a></li>
            <li class="paginItem more"><a href="javascript:;">...</a></li>
            <li class="paginItem"><a href="javascript:;">10</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>
</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>