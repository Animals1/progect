<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/drivingSchool/Public/admin/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/drivingSchool/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
    <script src="/drivingSchool/Public/admin/js/jquery.js"></script>

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

<!--<div class="place">-->
    <!--<span>位置：</span>-->
    <!--<ul class="placeul">-->
        <!--<li><a href="#">首页</a></li>-->
        <!--<li><a href="#">数据表</a></li>-->
        <!--<li><a href="#">基本内容</a></li>-->
    <!--</ul>-->
<!--</div>-->

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click1"><span><img src="/drivingSchool/Public/admin/images/t01.png" /></span><a href="/drivingSchool/index.php/Home/Administration/addveh">添加</a></li>
            <li class="click1"><span><img src="/drivingSchool/Public/admin/images/t02.png" /></span><a href="">修改</a></li>
            <li><span><img src="/drivingSchool/Public/admin/images/t03.png" /></span><a href="javascript:; delAll()">删除</a></li>
            <li><span><img src="/drivingSchool/Public/admin/images/t04.png" /></span><a href="">统计</a></li>

            <li>
                车型:<select name="coach_driving" id="coach_driving" ">
                <option value="-1">请选择</option>
                <?php if(is_array($driving)): foreach($driving as $key=>$driving): ?><option value="<?php echo ($driving["driving_id"]); ?>"><?php echo ($driving["driving_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </li>
            <li>
                教练车类型:<select name="coach_motor" id="coach_motor" ">
                <option value="-1">请选择</option>
            <?php if(is_array($motor)): foreach($motor as $key=>$motor): ?><option value="<?php echo ($motor["motor_id"]); ?>"><?php echo ($motor["motor_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </li>
            <li>
                状态:<select name="car_status" id="car_status" >
                <option value="-1">请选择</option>
                <?php if(is_array($status)): foreach($status as $key=>$status): ?><option value="<?php echo ($status["status_id"]); ?>"><?php echo ($status["status_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </li>
            <li>车牌:<input type="text" name="car_number" id="car_number" style="width: 100px;"></li>
            <li>行驶证号:<input type="text" name="license_number" id="license_number" style="width: 100px;"></li>
            <li><input type="button" value="搜索" onclick="search()"></li>
        </ul>
        <script>
            function search()
            {
                var coach_driving=$('#coach_driving').val();
                var coach_motor=$('#coach_motor').val();
                var car_status=$('#car_status').val();
                var car_number=$('#car_number').val();
                var license_number=$('#license_number').val();
                //批量删除
                $.ajax({
                    url: "/drivingSchool/index.php/Home/Administration/registrationsearch",
                    type: 'get',
                    data: {'coach_driving':coach_driving,'coach_motor':coach_motor,'car_status':car_status,'car_number':car_number,'license_number':license_number},
                    success: function (data) {
                        //alert(data)
                        $("#div").html(data);
                    }
                })

            }
        </script>

        <ul class="toolbar1">
            <li><span><img src="/drivingSchool/Public/admin/images/t05.png" /></span><a href="/drivingSchool/index.php/Home/Administration/addveh">车辆登记</a></li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="qx" type="checkbox" value="" id="qx" onclick="allSelect()"/></th>
            <th>序号<i class="sort"><img src="/drivingSchool/Public/admin/images/px.gif" /></i></th>
            <th>车牌号</th>
            <th>车型</th>
            <th>行驶证号</th>
            <th>教练车类型</th>
            <th>保险有效期</th>
            <th>登记日期</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($car)): foreach($car as $key=>$car): ?><tr>
            <td><input name="dx" type="checkbox" value="<?php echo ($car["veh_id"]); ?>" /></td>
            <td><?php echo ($car["veh_id"]); ?></td>
            <td><?php echo ($car["veh_number"]); ?></td>
            <td><?php echo ($car["driving_name"]); ?></td>
            <td><?php echo ($car["license_number"]); ?></td>
            <td><?php echo ($car["motor_name"]); ?></td>
            <td><?php echo (date("Y-m-d",$car["car_validity"])); ?></td>
            <td><?php echo (date("Y-m-d",$car["car_register"])); ?></td>
            <td><?php echo ($car["status_name"]); ?></td>
            <td><a href="/drivingSchool/index.php/Home/Administration/registrationdel/id/<?php echo ($car["veh_id"]); ?>" class="tablelink"> 修改</a></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <script>
        function allSelect()
        {
            var dx=document.getElementsByName('dx');
            var qx=document.getElementById('qx');
            for(var i=0;i<dx.length;i++)
            {
                if(qx.checked==true)
                {
                    dx[i].checked=true;
                }
                else
                {
                    dx[i].checked=false;
                }
            }
        }

        function delAll()
        {
            var dx=document.getElementsByName('dx');
            var arr=new Array();
            for(var i=0;i<dx.length;i++)
            {
                if(dx[i].checked == true)
                {
                    arr.push(dx[i].value);
                    //alert(arr);
                }
            }
            var ids=arr.join(',');
           // alert(ids);
            if(ids)
            {
                //批量删除
                $.ajax({
                    url: "/drivingSchool/index.php/Home/Administration/registrationdel",
                    type: 'get',
                    data: {'id': ids},
                    success: function (data) {
                        //alert(data)
                        $("#div").html(data);
                    }
                })
            }

            }
    </script>

    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($p); ?>&nbsp;</i>页</div>
        <div class="list-page">
            <?php echo ($page); ?>
        </div>
    </div>




</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</html>