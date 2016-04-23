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

    <div class="formtitle"><span>车辆管理</span></div>
    <form action="/drivingSchool/index.php/Home/Administration/vehsettingadd" method="post">
        <h4>车辆类型(考试类型)配置</h4>
        <?php if(is_array($driving_type)): foreach($driving_type as $key=>$v): ?><td><input type="checkbox" name="driving_type[]" value="<?php echo ($v["driving_id"]); ?>"><?php echo ($v["driving_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td><?php endforeach; endif; ?>
        <hr>
        <h4>教练车类型配置</h4>
        <table>
            <tr>
                <td>名称&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;类型</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;操作</td>
            </tr>

                <tr>
                    <td><input type="text" name="motor_name">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><select name="model_name" id="">
                        <?php if(is_array($coach_model)): foreach($coach_model as $key=>$v): ?><option value="<?php echo ($v["model_id"]); ?>"><?php echo ($v["model_name"]); ?></option><?php endforeach; endif; ?>>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>

            <?php if(is_array($coach_motor)): foreach($coach_motor as $key=>$vv): ?><tr>
                <td><?php echo ($vv["motor_name"]); ?></td>
                <td><?php echo ($vv["model_name"]); ?></td>
                <td>
                    <a href="/drivingSchool/index.php/Home/Administration/vehsettingadd/id/<?php echo ($vv["motor_id"]); ?>">修改</a>&nbsp;&nbsp;
                    <a href="/drivingSchool/index.php/Home/Administration/delvehsetting/id/<?php echo ($vv["motor_id"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </table>

        <input type="submit" value="添加">
    </form>


</div>
</body>

</html>