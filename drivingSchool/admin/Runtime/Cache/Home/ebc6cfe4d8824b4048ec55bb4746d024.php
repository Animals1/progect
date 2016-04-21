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

    <div class="formtitle"><span>新增车辆</span></div>
    <form action="/index.php/Home/Administration/bussetting" method="post">
        <table>
            <tr>
                <td>班车路线:</td>
                <td><input type="text" name="bus_route"></td>
            </tr>
            <tr>
                <td>车牌号:</td>
                <td><input type="text" name="car_number"></td>
            </tr>
            <tr >

                <td>途径站点:</td>
                <td>
                    <input type="text" name="bus_station[]">
                    <select name="time[]" id="">
                        <option value="-1">请选择小时</option>
                        <?php for($time=0;$time<=24;$time++){?>
                        <option value="<?php echo $time ?>"><?php echo $time?></option>
                        <?php }?>
                    </select>

                    <select name="min[]" id="">
                        <option value="-1">请选择分钟</option>
                        <?php for($min=0;$min<=60;$min++){?>
                        <option value="<?php echo $min?>"><?php echo $min?></option>
                        <?php }?>
                    </select>
                    <input type="button" value="增加新站点"    onclick="adddd(this)">
                </td>

            </tr>

            <script>
                function adddd(obj)
                {
                    var trq=$(obj).parent().parent();
                    tr='<tr > <td>途径站点:</td> <td> <input type="text" name="bus_station[]">';
                    tr+='<select name="time[]" id=""> <option value="-1">请选择小时</option>';
                    tr+='<?php for($time=0;$time<=24;$time++){?>';
                    tr+='<option value="<?php echo $time?>"><?php echo $time?></option>';
                    tr+='<?php }?>';
                    tr+='</select>';

                    tr+='<select name="min[]" id=""> <option value="-1">请选择分钟</option>';
                    tr+='<?php for($min=0;$min<=60;$min++){?>';
                    tr+='<option value="<?php echo $min?>"><?php echo $min?></option>';
                    tr+='<?php }?>';
                    tr+='</select></tr>';

                        trq.after(tr);
                    //alert(trq)
                }
            </script>

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