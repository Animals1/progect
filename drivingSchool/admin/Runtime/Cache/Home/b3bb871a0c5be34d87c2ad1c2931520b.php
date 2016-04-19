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
        <li><a href="#">车辆更换</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click">车牌号:<input type="text" name="car_number" id="car_number"></li>
            <li class="click">申请人:<select name="replace_name" id="replace_name">
                <option value="-1">请选择</option>
                <?php if(is_array($coachMess)): foreach($coachMess as $key=>$coachMess): ?><option value="<?php echo ($coachMess["staff_id"]); ?>"><?php echo ($coachMess["staff_name"]); ?></option><?php endforeach; endif; ?>
            </select></li>
            <li>日期: <input class="laydate-icon" onclick="laydate()" id='laydate'></li>
            <li><input type="button" value="查找" onclick="searchvalue()"></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/vehreplaceadd">申请换车</a></li>
        </ul>

    </div>
    <script>
        function searchvalue()
        {

            var car_number=$('#car_number').val();
            var replace_name=$('#replace_name').val();
            var laydate=$('#laydate').val();

            $.ajax({
                url: "/index.php/Home/Administration/replacesearch",
                type: 'get',
                data: {'car_number':car_number,'replace_name':replace_name,'laydate':laydate},
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

            <th>申请人</th>
            <th>更换时间</th>
            <th>更换详情</th>
            <th>换车原因</th>
            <th>处理人</th>

        </tr>
        </thead>
        <tbody>
<?php if(is_array($replace)): foreach($replace as $key=>$rep): ?><tr>

            <td><?php echo ($rep["staff_name"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$rep["replace_time"])); ?></td>
            <td><?php echo ($rep["car_number"]); ?>--><?php echo ($rep["after_number"]); ?></td>
            <td><?php echo ($rep["replace_reason"]); ?></td>
            <td><?php echo ($rep["deal_name"]); ?></td>
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
<script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>
</html>