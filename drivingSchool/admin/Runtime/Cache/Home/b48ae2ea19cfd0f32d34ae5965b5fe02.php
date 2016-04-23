<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="/drivingSchool/Public/text/javascript">

    </script>


</head>


<body style="background:#FFF8ED;">

<div class="formbody">

    <div class="formtitle"><span>新增车辆</span></div>
    <form action="/drivingSchool/index.php/Home/Administration/addveh" method="post">
    <table>
        <tr>
            <td>车牌号:</td>
            <td><input type="text" name="veh_number"></td>
        </tr>
        <tr>
            <td>行驶证号</td>
            <td><input type="text" name="license_number"></td>
        </tr>
        <tr>
            <td>车型:</td>
            <td>
                <select name="driving_id" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($driving)): foreach($driving as $key=>$driving): ?><option value="<?php echo ($driving["driving_id"]); ?>"><?php echo ($driving["driving_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>车辆类型:</td>
            <td>
                <select name="motor_id" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($motor)): foreach($motor as $key=>$motor): ?><option value="<?php echo ($motor["motor_id"]); ?>"><?php echo ($motor["motor_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>状态:</td>
            <td>
                <select name="car_status" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($status)): foreach($status as $key=>$status): ?><option value="<?php echo ($status["status_id"]); ?>"><?php echo ($status["status_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>保险有效期:</td>
            <td>
                <input class="laydate-icon" onclick="laydate()">
            </td>
        </tr>
        <tr>
            <td>可预约类型</td>
            <td>
                <select name="type_id" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($type)): foreach($type as $key=>$type): ?><option value="<?php echo ($type["type_id"]); ?>"><?php echo ($type["type_name"]); ?></option><?php endforeach; endif; ?>
                </select>



            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="保存">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
    </form>

</div>
</body>
<script type="text/javascript" src="/drivingSchool/Public/date/laydate/laydate.js"></script>
</html>