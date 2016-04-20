<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>



</head>


<body style="background:#FFF8ED;">

<div class="formbody">

    <div class="formtitle"><span>油气添加申请</span></div>

    <form action="/index.php/Home/Administration/gasadd" method="post">
        <table>
            <tr>
                <td>申请人:</td>
                <td><input type="text" name="applicant_name"></td>
            </tr>
            <tr>
                <td>申请车辆:</td>
                <td><select name="car_number" id="">
                    <option value="-1">请选择</option>
                <?php if(is_array($car_number)): foreach($car_number as $key=>$number): ?><option value="<?php echo ($number["car_number"]); ?>"><?php echo ($number["car_number"]); ?></option><?php endforeach; endif; ?>

                </select></td>
            </tr>
            <tr>
                <td>油气类型</td>
                <td>
                    <select name="gas_type_id" id="">
                        <option value="-1">请选择</option>
                        <?php if(is_array($gas_type)): foreach($gas_type as $key=>$gas): ?><option value="<?php echo ($gas["gas_type_id"]); ?>"><?php echo ($gas["gas_type_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>申请数量:</td>
                <td><input type="button" value="-" onclick="jian()"><input height="30px" type="text" name="gas_volume" id="gas_volume" value="1" style="width: 30px;line-height: 30px">L<input
                        type="button" value="+" onclick="jia()"></td>
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
<script>

    function jia()
    {
        var gas=$('#gas_volume').val();
        var num=parseInt(gas)+1;
       $('#gas_volume').val(num);
    }
    function jian()
    {
        var gas=$('#gas_volume').val();
        var num=parseInt(gas)-1;
        if(num<=0)
        {
            $('#gas_volume').val(0);
        }
        else
        {
            $('#gas_volume').val(num);
        }

    }

</script>
</html>