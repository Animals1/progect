<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="/Public/text/javascript">

    </script>


</head>


<body style="background:#FFF8ED;">

<div class="formbody">

    <div class="formtitle"><span>申请更换车辆</span></div>

    <form action="/index.php/Home/Administration/vehreplaceadd" method="post">
        <table>
            <tr>
                <td>申请人:</td>
                <td><select name="replace_name" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($coachMess)): foreach($coachMess as $key=>$msg): ?><option value="<?php echo ($msg["coach_id"]); ?>"><?php echo ($msg["staff_name"]); ?></option><?php endforeach; endif; ?>
                </select></td>
            </tr>
            <tr>
                <td>被换车辆:</td>
                <td><select name="replace_number_before" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($car_number)): foreach($car_number as $key=>$number): ?><option value="<?php echo ($number["car_id"]); ?>"><?php echo ($number["car_number"]); ?></option><?php endforeach; endif; ?>
                </select></td>
            </tr>
            <tr>
                <td>换成车辆:</td>
                <td><select name="replace_number_after" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($car_number)): foreach($car_number as $key=>$number): ?><option value="<?php echo ($number["car_id"]); ?>"><?php echo ($number["car_number"]); ?></option><?php endforeach; endif; ?>
                </select></td>
            </tr>
            <tr>
                <td>换车原因:</td>
                <td><textarea name="change_reason" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="repair" value="checked">同时申请报修</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="提交">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>

    </form>
</div>
</body>

</html>