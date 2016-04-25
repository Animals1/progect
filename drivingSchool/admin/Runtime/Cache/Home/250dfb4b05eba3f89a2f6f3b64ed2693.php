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
                        maximum: 100,
                        interval: 10
                    }
                ],

                series: [

                    {
                        type: 'column',
                        title:'#93汽油',
                        data: <?php echo $data93 ?>
                    },

                    {
                        type: 'column',
                        title:'#95汽油',
                        data: <?php echo $data97 ?>
                    },

                    {
                        type: 'column',
                        title:'#97柴油',
                        data: <?php echo $data99 ?>
                    },

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



</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>