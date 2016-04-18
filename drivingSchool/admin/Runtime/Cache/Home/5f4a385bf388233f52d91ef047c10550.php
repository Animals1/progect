<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
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


<body style="background:#FFF8ED;" id="div">

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">车辆管理</a></li>
        <li><a href="#">车辆维修</a></li>
    </ul>
</div>

<div class="rightinfo" >

    <div class="tools">

        <!--<ul class="toolbar">-->
            <!--<li class="click"><span><img src="/Public/admin/images/t01.png" /></span>添加</li>-->
            <!--<li class="click"><span><img src="/Public/admin/images/t02.png" /></span>修改</li>-->
            <!--<li><span><img src="/Public/admin/images/t03.png" /></span>删除</li>-->
            <!--<li><span><img src="/Public/admin/images/t04.png" /></span>统计</li>-->
        <!--</ul>-->


        <ul class="toolbar1" >
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/servicerecordadd">维修登记</a></li>
        </ul>
        <table>
            <tr>
                <td>车牌号:<input type="text" name="car_number" id="car_number"></td>
                <td>报修人:<select name="repair_coachname" id="repair_coachname">
                    <option value="-1">请选择</option>
                    <?php if(is_array($coachMess)): foreach($coachMess as $key=>$coachMess): ?><option value="<?php echo ($coachMess["staff_id"]); ?>"><?php echo ($coachMess["staff_name"]); ?></option><?php endforeach; endif; ?>
                </select></td>
                <td>日期: <input class="laydate-icon" onclick="laydate()" id='laydate'></td>
                <td>状态:
                    <select name="repair_status" id="status">
                        <option value="-1">请选择</option>
                        <?php if(is_array($status)): foreach($status as $key=>$status): ?><option value="<?php echo ($status["repair_statusid"]); ?>"><?php echo ($status["repair_statusname"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
                <td><input type="button" value="查找" onclick="searchvalue()"></td>
            </tr>
        </table>
    </div>
    <script>
        function searchvalue()
        {

            var car_number=$('#car_number').val();
            var repair_coachname=$('#repair_coachname').val();
            var laydate=$('#laydate').val();
            var status=$('#status').val();

            $.ajax({
                url: "/index.php/Home/Administration/repairsearch",
                type: 'get',
                data: {'car_number':car_number,'repair_coachname':repair_coachname,'laydate':laydate,'repair_status':status},
                success: function (data) {
                    //alert(data)
                    $("#div").html(data);
                }
            })
        }
    </script>


    <table class="tablelist">
        <thead>
        <tr>
            <th>报修人</th>
            <th>维修时间</th>
            <th>维修车辆</th>
            <th>报修原因</th>
            <th>维修人</th>
            <th>处理人</th>
            <th>维修结果</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($repair)): foreach($repair as $key=>$repair): ?><tr>
                <td><?php echo ($repair["staff_name"]); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$repair["repair_time"])); ?></td>
                <td><a href="/index.php/Home/Administration/servicerecord/id/<?php echo ($repair["car_number"]); ?>"><?php echo ($repair["car_number"]); ?></a></td>
                <td><?php echo ($repair["repair_desc"]); ?></td>
                <td><?php echo ($repair["repair_rename"]); ?></td>
                <td><?php echo ($repair["repair_rename"]); ?></td>
                <td><?php echo ($repair["repair_statusname"]); ?></td>
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


    <!--<div class="tip">-->
        <!--<div class="tiptop"><span>提示信息</span><a></a></div>-->

        <!--<div class="tipinfo">-->
            <!--<span><img src="/Public/admin/images/ticon.png" /></span>-->
            <!--<div class="tipright">-->
                <!--<p>是否确认对信息的修改 ？</p>-->
                <!--<cite>如果是请点击确定按钮 ，否则请点取消。</cite>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="tipbtn">-->
            <!--<input name="" type="button"  class="sure" value="确定" />&nbsp;-->
            <!--<input name="" type="button"  class="cancel" value="取消" />-->
        <!--</div>-->

    <!--</div>-->




</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>
<script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>
</html>