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

    <div class="formtitle"><span>车辆维修登记</span></div>

    <form action="/index.php/Home/Administration/servicerecordadd" method="post">
    <table>
        <tr>
            <td>报修车辆:</td>
            <td>
                <select name="repair_carid" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($vehicles)): foreach($vehicles as $key=>$car): ?><option value="<?php echo ($car["car_id"]); ?>"><?php echo ($car["car_number"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>报修人:</td>
            <td>
                <select name="repair_coachname" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($coachMess)): foreach($coachMess as $key=>$msg): ?><option value="<?php echo ($msg["coach_id"]); ?>"><?php echo ($msg["staff_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>报修原因</td>
            <td><textarea name="repair_desc" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="提交">
                <input type="reset" value="取消">
            </td>
        </tr>
    </table>
    </form>

</div>
</body>

</html>