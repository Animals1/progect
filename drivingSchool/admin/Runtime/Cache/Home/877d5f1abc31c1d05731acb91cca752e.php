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

    <div class="formtitle"><span>车辆分配</span></div>
    <form action="/index.php/Home/Administration/carassignment" method="post">
        <table>
            <tr>
                <td>车牌号:</td>
                <td><select name="car_id" id="">
                    <option value="-1">请选择</option>
                    <?php if(is_array($car)): foreach($car as $key=>$car): ?><option value="<?php echo ($car["car_id"]); ?>"><?php echo ($car["car_number"]); ?></option><?php endforeach; endif; ?>
                </select></td>
            </tr>
         <tr>
             <td>教练:</td>
             <td>
                 <select name="coach_id" id="">
                     <option value="-1">请选择</option>
            <?php if(is_array($coach)): foreach($coach as $key=>$coach): ?><option value="<?php echo ($coach["coach_id"]); ?>"><?php echo ($coach["staff_name"]); ?></option><?php endforeach; endif; ?>
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
<script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>
</html>