<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/progect/drivingSchool/Public/admin/css/style.css" rel="stylesheet" type="text/css" />


</head>


<body>

  <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">人事</a></li>
    <li><a href="#">员工添加</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
        
    <div class="formtitle"><span>基本信息</span></div>
    <form action="/progect/drivingSchool/index.php/Home/Staff/adds" enctype="multipart/form-data" method="post" >
    <ul class="forminfo">
    <li><label>员工照片</label><input name="img" type="file" /></li>
    <li><label>姓名：</label><input name="name" type="text" class="dfinput" />&nbsp;&nbsp;&nbsp;&nbsp;
        编号：<input name="sn" type="text" class="dfinput" />
    </li>
    <li><label>性别：</label><select name="sex" id="">
        <option value='1'>男</option>
        <option value='2'>女</option>
    </select> &nbsp;&nbsp;&nbsp;&nbsp;
        出生年月：<input type="text" class="sang_Calender" name="year" />
    </li>
    <li><label>婚否：</label><select name="marriage" id="">
        <option value='1'>是</option>
        <option value='2'>不是</option>
    </select>
    </li>
    <li><label>籍贯：</label>
    <select name="birthplace" id="select" class="site">
      <option value="0">--请选择--</option>
        <?php if(is_array($region)): foreach($region as $key=>$rev): ?><option value="<?php echo ($rev["region_id"]); ?>"><?php echo ($rev["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    <select name="birthplace1" id="select2" class="site">
        <option value="0">--请选择--</option>
      </select>
      <select name="birthplace2" id="select3" class="site">
        <option value="0">--请选择--</option>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    户口所在地：
    <select name="account" id="select" class="site">
      <option value="0">--请选择--</option>
        <?php if(is_array($region)): foreach($region as $key=>$rev): ?><option value="<?php echo ($rev["region_id"]); ?>"><?php echo ($rev["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    <select name="account1" id="select2" class="site">
        <option value="0">--请选择--</option>
      </select>
      <select name="account2" id="select3" class="site">
        <option value="0">--请选择--</option>
    </select>
    </li>
    <li><label>现住地址：</label>
    <select name="curaddress" id="select" class="site">
      <option value="0">--请选择--</option>
        <?php if(is_array($region)): foreach($region as $key=>$rev): ?><option value="<?php echo ($rev["region_id"]); ?>"><?php echo ($rev["region_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    <select name="curaddress1" id="select2" class="site">
        <option value="0">--请选择--</option>
      </select>
      <select name="curaddress2" id="select3" class="site">
        <option value="0">--请选择--</option>
    </select>
    <input name="curaddress3" type="text" class="dfinput" />
    </li>
    <li><label>民族：</label><input name="nation" type="text" class="dfinput" />&nbsp;&nbsp;&nbsp;&nbsp;
        身份证号：<input name="idcard" type="text" class="dfinput" />
    </li>
    <li><label>联系电话：</label><input name="tel" type="text" class="dfinput" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    电子邮箱：<input name="email" type="text" class="dfinput" />
    </li>
    <li><label></label>
    合同开始日期：<input type="text" class="sang_Calender" name="startyear" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    合同结束日期：<input type="text" class="sang_Calender" name="endyear" />
    </li>
    <li><label>入职岗位：</label>
    <select name="role" id="ro">
        <?php if(is_array($role)): foreach($role as $key=>$vo): ?><option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?></option><?php endforeach; endif; ?>
    </select>
    </li>
    <div style="display: block" id="list">
        <li><label></label>
        教练证初领日：<input type="text" class="sang_Calender" name="coachyear" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        教练证有效期：<input type="text" class="sang_Calender" name="coachvalidity" />
        </li>
        <li><label></label>
        驾驶证初领日：<input type="text" class="sang_Calender" name="drivingyear" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        驾驶证有效期：<input type="text" class="sang_Calender" name="drivingvalidity" />
        </li>
        <li><label>驾驶证类型：</label>
        <select name="drivingid" id="">
            <?php if(is_array($coach[0])): foreach($coach[0] as $key=>$coach_v): ?><option value="<?php echo ($coach_v["driving_id"]); ?>"><?php echo ($coach_v["driving_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        教练证编号：<input name="coachsn" type="text" class="dfinput" />
        </li>
        <li><label>教练等级：</label>
        <select name="gradeid" id="">
            <?php if(is_array($coach[1])): foreach($coach[1] as $key=>$grade_v): ?><option value="<?php echo ($grade_v["grade_id"]); ?>"><?php echo ($grade_v["grade_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </li>
        <li><label>可带教资质：</label>
            <?php if(is_array($coach[2])): foreach($coach[2] as $key=>$quality_v): ?><input type="checkbox" name="qualityid[]" id="" value="<?php echo ($quality_v["quality_id"]); ?>" />
                <?php echo ($quality_v["quality_name"]); endforeach; endif; ?>
        </li>
        <li><label>准教车型：</label>
            <?php if(is_array($coach[3])): foreach($coach[3] as $key=>$model_v): ?><input type="checkbox" name="modelid[]" id="" value="<?php echo ($model_v["model_id"]); ?>" />
                <?php echo ($model_v["model_name"]); endforeach; endif; ?>
        </li>
        <li><label>教练车类型：</label>
            <?php if(is_array($coach[4])): foreach($coach[4] as $key=>$motor_v): ?><input type="checkbox" name="motorid[]" id="" value="<?php echo ($motor_v["motor_id"]); ?>" />
                <?php echo ($motor_v["motor_name"]); endforeach; endif; ?>
        </li>
    </div>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    
    
    </ul>
    
    </form>
    </div>
    
    </div>
    
    

</body>

</html>
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/jquery.js"></script>        
<script type="text/javascript" src="/progect/drivingSchool/Public/admin/js/datetime.js"></script>
<script type="text/javascript">
        $(".site").live("change",function(){
            var obj = $(this)
            var id = obj.val();
            if(id == 0) {
                $(this).nextAll().html("<option value='0'>--请选择--</option>");
            }else{
                $.ajax({
                    type:"get",
                    url:"/progect/drivingSchool/index.php/Home/staff/area",
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