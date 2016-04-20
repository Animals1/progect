<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
    <script type="/Public/text/javascript">
    </script>

    <style type="text/css">
        table.imagetable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }
        table.imagetable th {
            background:#F99331 url('cell-blue.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #EB5409;
        }
        table.imagetable td {
            background:#dcddc0 url('cell-grey.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #999999;
        }

        select{
            width: 100px;
            text-align: center;
        }
    </style>
    <script src="/Public/laydate/laydate.js"></script>
    <style>
        h2{line-height:30px; font-size:20px;}
        a,a:hover{ text-decoration:none;}
        pre{font-family:'微软雅黑'}
        .box{width:970px; padding:10px 20px; background-color:#fff; margin:10px auto;}
        .box a{padding-right:20px;}
    </style>
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
                window.location.href="/index.php/Home/Finance/salary";
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

        });
    </script>
</head>

<body style="background:#FFF8ED;">
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="click"><span><img src="/Public/admin/images/t02.png" /></span>列表</li>

            <li><a href="/index.php/Home/Finance/income"><span><img src="/Public/admin/images/t04.png" /></span>统计</a></li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>发工资</li>
        </ul>

    </div>

    <form action="dosalary" method="post">
        <table class="imagetable" >
            <tr>
                <th>岗位:</th>
                <td>
                    <select name="role_id">
                        <option value="0">--请选择--</option>
                        <?php foreach($get as $v){?>
                        <option value="<?php echo $v['role_id'];?>"><?php echo $v['role_name'];?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>姓名:</th>
                <td>
                    <select name="staff_id">
                        <option value="0">--请选择--</option>
                        <?php foreach($all as $v3){?>
                        <option value="<?php echo $v3['staff_id'];?>"><?php echo $v3['staff_name'];?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>出勤天数:</th>
                <td>
                    <input type="text"  name="salary_day">天
                </td>
            </tr>
            <tr>
                <th>实发工资:</th>
                <td>
                    <input type="text" name="salary_wages">元
                </td>
            </tr>
            <tr>
                <th>状态:</th>
                <td>
                    <select name="salary_status_id">
                        <option value="0">--请选择--</option>
                        <?php foreach($sta as $v4){?>
                        <option value="<?php echo $v4['salary_status_id'];?>"><?php echo $v4['salary_status_name'];?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="发工资">
                </td>
            </tr>
        </table>
    </form>

    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否返回列表 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>


</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>


</body>

</html>