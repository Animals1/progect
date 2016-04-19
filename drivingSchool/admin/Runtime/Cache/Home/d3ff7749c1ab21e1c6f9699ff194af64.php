<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/admin/laydate/laydate.js"></script>

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


<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">个人中心</a></li>
        <li><a href="#">我要请假</a></li>
    </ul>
</div>
<form action="/index.php/Home/Personal/staffleaveadd" method="post">
        <table style="margin-top:50px; margin-left:50px;">
            <tr>
                <td>姓名：<?php foreach($arr as $v){ echo $v['staff_name'];}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;员工编号：<?php foreach($arr as $v){ echo $v['staff_sn'];}?></td>
            </tr>
            <tr>
                <td><br/>职位：<?php foreach($arr as $v){ echo $v['role_name'];}?></td>
            </tr>
            <tr>
                <td><br/>开始时间：<input class="laydate-icon" onclick="laydate()" name="start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;结束时间：<input class="laydate-icon" id="demo" name="end"></td>
            </tr>
            <tr>
                <td><br/>请假天数：<input type="text" name="days" style=" width:70px; height:25px; background:#09C; color:#FFF; font-size:18px; font-weight:bold; text-indent:2em; text-align:left;">天&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请假类型：
                    <select name="type">
                        <option>---请选择---</option>
                        <?php foreach($arr1 as $v) {?>
                        <option value="<?php echo $v['type'];?>"><?php echo $v["type"];?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <br/>请假事由：<br/>
                    <textarea name="reason" cols="5" rows="10" style=" width: 400px;    min-height: 120px;    max-height: 300px;    _height: 120px; border-style:solid; border-width:1px; border-color:gray;"></textarea>
                </td>
            </tr>
            <tr>
                <td><br/><input type="submit" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Personal/personleave" style=" text-decoration: none;"><input type="button" value="取消"></a></td>
            </tr>
        </table>
    </form>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

<script>
;!function(){
laydate({
   elem: '#demo'
})
}();
</script>

</body>

</html>