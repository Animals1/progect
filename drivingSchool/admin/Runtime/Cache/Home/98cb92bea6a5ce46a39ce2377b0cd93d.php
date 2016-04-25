<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <li><a href="#">学员管理</a></li>
        <li><a href="#">投诉管理</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click">被投诉人:<select name="coach_name" id="coach_id" onchange="searchcoach()">
                <option value="-1">请选择</option>
<?php if(is_array($coach)): foreach($coach as $key=>$com): ?><option value="<?php echo ($com["staff_id"]); ?>"><?php echo ($com["staff_name"]); ?></option><?php endforeach; endif; ?>
            </select></li>
        </ul>

    </div>
    <script>
            function searchcoach()
            {
                var coach=$('#coach_id').val();
                $.ajax({
                    url: "/index.php/Home/Administration/complaintsearch",
                    type: 'get',
                    data: {'coach':coach},
                    success: function (data) {
                        //alert(data)
                        $("#div").html(data);
                    }
                })
            }
    </script>

    <table class="tablelist">
        <thead>
        <tr>

            <th>投诉人</th>
            <th>身份证号</th>
            <th>被投诉人</th>
            <th>被投诉人编号</th>
            <th>投诉事由</th>

        </tr>
        </thead>
        <tbody>
        <?php if(is_array($complaint)): foreach($complaint as $key=>$val): ?><tr>

            <td><?php echo ($val["stu_name"]); ?></td>
            <td><?php echo ($val["stu_idcard"]); ?></td>
            <td><?php echo ($val["staff_name"]); ?></td>
            <td><?php echo ($val["staff_sn"]); ?></td>
            <td><?php echo ($val["complaint_reason"]); ?></td>

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

</html>