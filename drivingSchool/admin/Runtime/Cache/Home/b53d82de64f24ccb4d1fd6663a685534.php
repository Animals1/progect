<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

    <script src="/Public/admin/js/jquery.js"></script>

</head>


<body style="background:#FFF8ED;">

<div class="formbody">

    <div class="formtitle"><span>新增小组</span></div>
    <form action="/index.php/Home/Administration/traingroupadd" method="post">
        <table>
            <tr>
                <td>小组名称:</td>
                <td><input type="text" name="group_name"></td>
            </tr>
            <tr>
                <td>组长:</td>
                <td><select name="lander" id="">
                    <option value="-1">请选择</option>
                <?php if(is_array($nogroup)): foreach($nogroup as $key=>$group): ?><option value="<?php echo ($group["staff_name"]); ?>"><?php echo ($group["staff_name"]); ?></option><?php endforeach; endif; ?>
                </select></td>
                <td>组长电话:</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>小组成员:</td>
                <td><?php if(is_array($nogroup)): foreach($nogroup as $key=>$group): ?><input type="checkbox" name="group_child[]" value="<?php echo ($group["staff_name"]); ?>"><?php echo ($group["staff_name"]); ?><br><?php endforeach; endif; ?></td>

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