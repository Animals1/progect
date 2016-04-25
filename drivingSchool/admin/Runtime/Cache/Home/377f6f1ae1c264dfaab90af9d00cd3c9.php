<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
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
        <li><a href="#">数据表</a></li>
        <li><a href="#">基本内容</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click">学员编号:<input type="text" name="stu_sn" id="stu_sn" style="width: 80px;"></li>
            <li class="click">学生姓名:<input type="text" name="stu_name" id="stu_name" style="width: 80px;"></li>
            <li>手机号:<input type="text" name="stu_tel" id="stu_tel" style="width: 80px"></li>
            <li>日期:<input class="laydate-icon" onclick="laydate()" id='laydate' style="width: 80px;"></li>
        </ul>
        <ul class="toolbar">
            <li>车型:<select name="motor_id" id="motor_id" style="width: 80px;">
                <option value="0">全部</option>
<?php if(is_array($driving)): foreach($driving as $key=>$driving): ?><option value="<?php echo ($driving["driving_name"]); ?>"><?php echo ($driving["driving_name"]); ?></option><?php endforeach; endif; ?>
            </select></li>
            <li>
                性别:<select name="sex_id" id="sex_id" style="width: 80px;">
                <option value="0">全部</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </li>
            <li>
                状态:
                <select name="stu_status_id" id="stu_status_id" style="width: 80px;">
                    <option value="0">全部</option>
<?php if(is_array($status)): foreach($status as $key=>$status): ?><option value="<?php echo ($status["stu_status_id"]); ?>"><?php echo ($status["stu_status_name"]); ?></option><?php endforeach; endif; ?>
                </select>

            </li>
            <li><input type="button" value="查找" onclick="searchvalue()"></li>
        </ul>

        <script>
            function searchvalue()
            {
                var stu_sn=$('#stu_sn').val();
                var stu_name=$('#stu_name').val();
                var stu_tel=$('#stu_tel').val();
                var laydate=$('#laydate').val();
                var motor_id=$('#motor_id').val();
                var sex_id=$('#sex_id').val();
                var stu_status_id=$('#stu_status_id').val();
                $.ajax({
                    url: "/index.php/Home/Administration/inschoolsearch",
                    type: 'get',
                    data: {'stu_sn':stu_sn,'stu_name':stu_name,'stu_tel':stu_tel,'laydate':laydate,'motor_id':motor_id,'sex_id':sex_id,'stu_status_id':stu_status_id},
                    success: function (data) {
                        //alert(data)
                        $("#div").html(data);
                    }
                })
            }
        </script>

        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/regstu">登记新学生</a></li>
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
            <th>序号</th>
            <th>编号<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>姓名</th>
            <th>性别</th>
            <th>身份证号</th>
            <th>手机号码</th>
            <th>车型</th>
            <th>学习阶段</th>
            <th>报名时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($student)): foreach($student as $key=>$stu): ?><tr>
            <td><?php echo ($stu["stu_id"]); ?></td>
            <td><?php echo ($stu["stu_sn"]); ?></td>
            <td><?php echo ($stu["stu_name"]); ?></td>
            <td><?php echo ($stu["sex_name"]); ?></td>
            <td><?php echo ($stu["stu_idcard"]); ?></td>
            <td><?php echo ($stu["stu_tel"]); ?></td>
            <td>
                <?php echo ($stu["cert_level"]); ?>
            </td>
            <td><?php if($stu["test_one"] == 0): ?>科一未完成
                <?php elseif($stu["test_two"] == 0): ?>科二未完成
                <?php elseif($stu["test_three"] == 0): ?>科三未完成
                <?php elseif($stu["test_four"] == 0): ?>科四未完成
                <?php else: ?>毕业<?php endif; ?></td>
            <td><?php echo ($stu["stu_time"]); ?></td>
            <td><?php echo ($stu["stu_status_name"]); ?></td>
            <td><a href="/index.php/Home/Administration/updatestudent/id/<?php echo ($stu["stu_id"]); ?>">修改</a></td>
        </tr><?php endforeach; endif; ?>

        </tbody>
    </table>


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
<script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>
</html>