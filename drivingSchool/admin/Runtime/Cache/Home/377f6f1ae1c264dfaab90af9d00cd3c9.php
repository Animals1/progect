<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<<<<<<< HEAD
<html xmlns="http://www.w3.org/1999/xhtml">
=======
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
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


<<<<<<< HEAD
<body style="background:#FFF8ED;">
=======
<body style="background:#FFF8ED;" id="div">
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">数据表</a></li>
        <li><a href="#">基本内容</a></li>
    </ul>
</div>

<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
<<<<<<< HEAD
            <li class="click"><span><img src="/Public/admin/images/t01.png" /></span>添加</li>
            <li class="click"><span><img src="/Public/admin/images/t02.png" /></span>修改</li>
            <li><span><img src="/Public/admin/images/t03.png" /></span>删除</li>
            <li><span><img src="/Public/admin/images/t04.png" /></span>统计</li>
        </ul>


        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span>我要请假</li>
=======
            <li class="click">学员编号:<input type="text" name="stu_sn" id="stu_sn" style="width: 80px;"></li>
            <li class="click">学生姓名:<input type="text" name="stu_name" id="stu_name" style="width: 80px;"></li>
            <li>手机号:<input type="text" name="stu_tel" id="stu_tel" style="width: 80px"></li>
            <li>日期:<input class="laydate-icon" onclick="laydate()" id='laydate' style="width: 80px;"></li>
        </ul>
        <ul class="toolbar">
            <li>车型:<select name="motor_id" id="motor_id" style="width: 80px;">
                <option value="0">全部</option>
<?php if(is_array($driving)): foreach($driving as $key=>$driving): ?><option value="<?php echo ($driving["driving_name"]); ?>"><?php echo ($driving["driving_name"]); ?></option><?php endforeach; endif; ?>
            </select></li>
            <li>
                性别:<select name="sex_id" id="sex_id" style="width: 80px;">
                <option value="0">全部</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </li>
            <li>
                状态:
                <select name="stu_status_id" id="stu_status_id" style="width: 80px;">
                    <option value="0">全部</option>
<?php if(is_array($status)): foreach($status as $key=>$status): ?><option value="<?php echo ($status["stu_status_id"]); ?>"><?php echo ($status["stu_status_name"]); ?></option><?php endforeach; endif; ?>
                </select>

            </li>
            <li><input type="button" value="查找" onclick="searchvalue()"></li>
        </ul>

        <script>
            function searchvalue()
            {
                var stu_sn=$('#stu_sn').val();
                var stu_name=$('#stu_name').val();
                var stu_tel=$('#stu_tel').val();
                var laydate=$('#laydate').val();
                var motor_id=$('#motor_id').val();
                var sex_id=$('#sex_id').val();
                var stu_status_id=$('#stu_status_id').val();
                $.ajax({
                    url: "/index.php/Home/Administration/inschoolsearch",
                    type: 'get',
                    data: {'stu_sn':stu_sn,'stu_name':stu_name,'stu_tel':stu_tel,'laydate':laydate,'motor_id':motor_id,'sex_id':sex_id,'stu_status_id':stu_status_id},
                    success: function (data) {
                        //alert(data)
                        $("#div").html(data);
                    }
                })
            }
        </script>

        <ul class="toolbar1">
            <li><span><img src="/Public/admin/images/t05.png" /></span><a href="/index.php/Home/Administration/regstu">登记新学生</a></li>
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
        </ul>

    </div>


    <table class="tablelist">
        <thead>
        <tr>
<<<<<<< HEAD
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>请假时间<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>销假时间</th>
            <th>请假类型</th>
            <th>请假天数</th>
            <th>请假原因</th>
=======
            <th>序号</th>
            <th>编号<i class="sort"><img src="/Public/admin/images/px.gif" /></i></th>
            <th>姓名</th>
            <th>性别</th>
            <th>身份证号</th>
            <th>手机号码</th>
            <th>车型</th>
            <th>学习阶段</th>
            <th>报名时间</th>
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130908</td>
            <td>王金平幕僚：马英九声明字字见血 人活着没意思</td>
            <td>admin</td>
            <td>江苏南京</td>
            <td>2013-09-09 15:05</td>
            <td>已审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink"> 删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130907</td>
            <td>温州19名小学生中毒流鼻血续：周边部分企业关停</td>
            <td>uimaker</td>
            <td>山东济南</td>
            <td>2013-09-08 14:02</td>
            <td>未审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130906</td>
            <td>社科院:电子商务促进了农村经济结构和社会转型</td>
            <td>user</td>
            <td>江苏无锡</td>
            <td>2013-09-07 13:16</td>
            <td>已销假</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130905</td>
            <td>江西&quot;局长违规建豪宅&quot;：局长检讨</td>
            <td>admin</td>
            <td>北京市</td>
            <td>2013-09-06 10:36</td>
            <td>已审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130904</td>
            <td>中国2020年或迈入高收入国家行列</td>
            <td>uimaker</td>
            <td>江苏南京</td>
            <td>2013-09-05 13:25</td>
            <td>已拒绝</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130903</td>
            <td>深圳地铁车门因乘客拉闸打开 3人被挤入隧道</td>
            <td>user</td>
            <td>广东深圳</td>
            <td>2013-09-04 12:00</td>
            <td>已审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130902</td>
            <td>33次地表塌陷 村民不敢下地劳作(图)</td>
            <td>admin</td>
            <td>湖南长沙</td>
            <td>2013-09-03 00:05</td>
            <td>未审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130901</td>
            <td>医患关系：医生在替改革不彻底背黑锅</td>
            <td>admin</td>
            <td>江苏南京</td>
            <td>2013-09-02 15:05</td>
            <td>未审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>

        <tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td>20130900</td>
            <td>山东章丘公车进饭店景点将自动向监控系统报警</td>
            <td>uimaker</td>
            <td>山东滨州</td>
            <td>2013-09-01 10:26</td>
            <td>已审核</td>
            <td><a href="#" class="tablelink">查看</a>     <a href="#" class="tablelink">删除</a></td>
        </tr>
=======
        <?php if(is_array($student)): foreach($student as $key=>$stu): ?><tr>
            <td><?php echo ($stu["stu_id"]); ?></td>
            <td><?php echo ($stu["stu_sn"]); ?></td>
            <td><?php echo ($stu["stu_name"]); ?></td>
            <td><?php echo ($stu["sex_name"]); ?></td>
            <td><?php echo ($stu["stu_idcard"]); ?></td>
            <td><?php echo ($stu["stu_tel"]); ?></td>
            <td>
                <?php echo ($stu["cert_level"]); ?>
            </td>
            <td><?php if($stu["test_one"] == 1): ?>科一已完成
                <?php elseif($stu["test_two"] == 1): ?>科二已完成
                <?php elseif($stu["test_three"] == 1): ?>科三已完成
                <?php elseif($stu["test_four"] == 1): ?>科四已完成
                <?php else: ?>毕业<?php endif; ?></td>
            <td><?php echo ($stu["stu_time"]); ?></td>
            <td><?php echo ($stu["stu_status_name"]); ?></td>
            <td><a href="/index.php/Home/Administration/updatestudent/id/<?php echo ($stu["stu_id"]); ?>">修改</a></td>
        </tr><?php endforeach; endif; ?>

>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
        </tbody>
    </table>


    <div class="pagin">
        <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem current"><a href="javascript:;">2</a></li>
            <li class="paginItem"><a href="javascript:;">3</a></li>
            <li class="paginItem"><a href="javascript:;">4</a></li>
            <li class="paginItem"><a href="javascript:;">5</a></li>
            <li class="paginItem more"><a href="javascript:;">...</a></li>
            <li class="paginItem"><a href="javascript:;">10</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>


<<<<<<< HEAD
    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="/Public/admin/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否确认对信息的修改 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>
=======
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435




</div>
</body>
<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>
<<<<<<< HEAD

=======
<script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>
>>>>>>> 02c55c9766aa90a08ab05bda2ad9bdc5c0cc3435
</html>