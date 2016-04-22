<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/date/laydate/laydate.js"></script>

</head>


<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">学员管理</a></li>
        <li><a href="#">在校学员</a></li>
    </ul>
</div>

<div class="mainindex">

    <div class="formtitle"><span>入学登记</span></div>
    <form action="/index.php/Home/Administration/regstu" enctype="multipart/form-data" method="post" >
        <ul class="forminfo">
            <li><label>报名时间:</label><input class="laydate-icon" onclick="laydate()" name="stu_time"></li>
            <li><label>姓名：</label><input name="stu_name" type="text" class="dfinput"  />&nbsp;&nbsp;&nbsp;&nbsp;
            </li>
            <li><label> 编号：</label><input name="stu_sn" type="text" class="dfinput" /></li>
            <li><label>性别：</label><select name="stu_sex" id="">
                <option value='1'>男</option>
                <option value='2'>女</option>
            </select> &nbsp;&nbsp;&nbsp;&nbsp;
            </li>

            <li><label>户口所在地：</label>
                <select name="stu_birthplace" id="select" class="site">
                    <option value="0">--请选择--</option>
                    <?php if(is_array($region)): foreach($region as $key=>$rev): ?><option value="<?php echo ($rev["region_id"]); ?>"><?php echo ($rev["region_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                <select name="stu_birthplace1" id="select2" class="site">
                    <option value="0">--请选择--</option>
                </select>
                <select name="stu_birthplace2" id="select3" class="site">
                    <option value="0">--请选择--</option>
                </select>

            </li>
            <li><label>现住地址：</label>
                <select name="stu_curaddress" id="select" class="site">
                    <option value="0">--请选择--</option>
                    <?php if(is_array($region)): foreach($region as $key=>$rev): ?><option value="<?php echo ($rev["region_id"]); ?>"><?php echo ($rev["region_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                <select name="stu_curaddress1" id="select2" class="site">
                    <option value="0">--请选择--</option>
                </select>
                <select name="stu_curaddress2" id="select3" class="site">
                    <option value="0">--请选择--</option>
                </select>

            </li>
            <li><lable></lable> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input name="curaddress" type="text" class="dfinput" /></li>
            <li>
                身份证号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="idcard" type="text" class="dfinput" />
            </li>
            <li><label>身份证上传:</label><input name="stu_photo" type="file" /></li>
            <li><label>联系电话：</label><input name="stu_tel" type="text" class="dfinput" />
                &nbsp;&nbsp;&nbsp;&nbsp;

            </li>
            <li>
                <lable>
                    电子邮箱：
                </lable>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="stu_email" type="text" class="dfinput" />
            </li>
            <li>
                <label>报名课程:</label>
                <select name="stu_motor" id="">
                <option value="">--请选择--</option>
                <?php if(is_array($motor)): foreach($motor as $key=>$motor): ?><option value="<?php echo ($motor["motor_id"]); ?>"><?php echo ($motor["motor_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </li>
            <li>
                <label>报名类型:</label>
                <select name="cert_level" id="">
                <option value="">--请选择--</option>
                <?php if(is_array($driving)): foreach($driving as $key=>$driving): ?><option value="<?php echo ($driving["driving_name"]); ?>"><?php echo ($driving["driving_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </li>
            <li>
                <label>体检结果:</label><select name="stu_test" id="">
                <option value="0">--请选择--</option>
                <option value="0">未体检</option>
                <option value="0">体检合格</option>
                <option value="0">体检未合格</option>
            </select>
            </li>

            <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>


        </ul>

    </form>
</div>

</div>



</body>

</html>
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>

<script>
    $(".site").live("change",function(){
        var obj = $(this)
        var id = obj.val();
        if(id == 0) {
            $(this).nextAll().html("<option value='0'>--请选择--</option>");
        }else{
            $.ajax({
                type:"get",
                url:"/index.php/Home/staff/area",
                data:"id="+id,
                dataType:"json",
                success:function(msg){
                    str ="<option value='0'>--请选择--</option>";
                    for (a in msg) {
                        str+="<option value=\""+msg[a].region_id+"\">"+msg[a].region_name+"</option>";
                    }
                    if (msg != '') {
                        obj.next().html(str)
                    }
                }
            })
        }
    })
    $('#ro').ready( function (){
        $('#list').css('display','block');
    });
    $('#ro').change( function () {
        var obj = $(this)
        var id = obj.val();
        if (id == '1') {
            $('#list').css('display','block');
        }else{
            $('#list').css('display','none');
        }

    });
</script>