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
        <li><a href="#">行政</a></li>
        <li><a href="#">教练管理</a></li>
        <li><a href="#">教练信息</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click">编号:<input type="text" name="staff_sn" id="staff_sn"></li>
            <li class="click">姓名:<input type="text" name="staff_name" id="staff_name"></li>
            <li>身份证号:<input type="text" name="staff_idcard" id="staff_idcard"></li>
            <li>教练分组:<select name="group_id" id="group" onchange="group()">
                <option value="-1">请选择</option>
<?php if(is_array($group)): foreach($group as $key=>$group): ?><option value="<?php echo ($group["group_id"]); ?>"><?php echo ($group["group_name"]); ?></option><?php endforeach; endif; ?>
            </select></li>
            <li><input type="button"  value="搜索"></li>
        </ul>
    </div>
    <script>
        function group()
        {
            var staff_sn=$('#staff_sn').val();
            var staff_name=$('#staff_name').val();
            var staff_idcard=$('#staff_idcard').val();
            var id=$('#group').val();

            $.ajax({
                url: "/index.php/Home/Administration/searchgroup",
                type: 'get',
                data: {'id':id,'staff_sn':staff_sn,'staff_name':staff_name,'staff_idcard':staff_idcard},
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
            <th>序号</th>
            <th>编号</th>
            <th>姓名</th>
            <th>身份证号</th>
            <th>出生年月</th>
            <th>性别</th>
            <th>教练证编号</th>
            <th>教练证有效期</th>
            <th>合同结束日期</th>
            <th>联系电话</th>
            <th>教练组别</th>
        </tr>
        </thead>
        <tbody>
    <?php if(is_array($coach)): foreach($coach as $key=>$coach): ?><tr>
            <td><?php echo ($coach["coach_id"]); ?></td>
            <td><?php echo ($coach["staff_sn"]); ?></td>
            <td><?php echo ($coach["staff_name"]); ?></td>
            <td><?php echo ($coach["staff_idcard"]); ?></td>
            <td><?php echo (date("Y-m-d",$coach["staff_year"])); ?></td>
            <td><?php echo ($coach["sex_name"]); ?></td>
            <td><?php echo ($coach["coach_sn"]); ?></td>
            <td><?php echo (date("Y-m-d",$coach["coach_validity"])); ?></td>
            <td><?php echo (date("Y-m-d",$coach["staff_end_year"])); ?></td>
            <td><?php echo ($coach["staff_tel"]); ?></td>
            <td><?php echo ($coach["group_name"]); ?></td>
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