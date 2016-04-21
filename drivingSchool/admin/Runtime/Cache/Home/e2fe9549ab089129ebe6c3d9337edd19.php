<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">公司维护</a></li>
    <li><a href="#">基本信息</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span><a href="#" onclick="show(1)">企业介绍</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="show(2)">基础信息</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="show(3)">企业资质</a></span></div>
    
    <div id="di1">
    <form action="/index.php/Home/Company/companyadd" method="post" enctype="multipart/form-data" onsubmit="return fun();">

    <ul class="forminfo">
    <li><label>*企业LOGO：</label><input name="img" type="file" class="dfinput" /><i>
    <!-- <img src="/Public/admin/images/jszc.png" width="100" height="100"> -->
    <img src="<?php
 foreach($arr as $v){ if($v['company_logo']==''){ echo '/Public/admin/images/jszc.png'; }else{ echo '/Public/'.$v['company_logo']; } } ?>" width="100" height="100" title="企业LOGO">
    </i></li>
    <li><label>*联系人：</label><input name="company_person" id="company_person" onblur="fun1();" type="text" class="dfinput" value="<?php foreach($arr as $v){ echo $v['company_person'];}?>" /><span id="span_person" style="margin-left:500px;"></span></li>
    <li><label>*联系电话：</label><input name="company_tel" id="company_tel" onblur="fun2();" type="text" class="dfinput" value="<?php foreach($arr as $v){ echo $v['company_tel'];}?>" /><span id="span_tel" style="margin-left:500px;"></span></li>
    <!-- <li><label>是否审核</label><cite><input name="" type="radio" value="" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="" />否</cite></li> -->
    <li><label>*传真：</label><input name="company_fax" id="company_fax" onblur="fun3();" type="text" class="dfinput" value="<?php foreach($arr as $v){ echo $v['company_fax'];}?>"/><span id="span_fax" style="margin-left:500px;"></span></li>
    <li><label>*企业简介：</label><textarea name="company_brief" id="company_brief" onblur="fun4();" cols="" rows="" class="textinput"  title="请输入您的企业简介"><?php foreach($arr as $v){ echo $v['company_brief'];}?></textarea><span id="span_brief" style="margin-left:500px;"></span></li>
    <li><label>&nbsp;</label><input name="sub" type="submit" class="btn" value="保存"/></li>
    </ul>

    </form>

    </div>

    <div id="di2" style="display:none;">
    <form action="/index.php/Home/Company/basics" method="post">
        <ul>
            <li>
            <input type="hidden" name="id" value="<?php foreach($arr as $v){ echo $v['company_id'];}?>">
            <textarea name="company_desc" id="company_desc"  cols="" rows="" class="textinput"  title="请输入您的企业基础信息"><?php foreach($arr as $v){ echo $v['company_desc'];}?></textarea><span id="span_desc" style="margin-left:500px;"></span></li>
    <li><label>&nbsp;</label><input name="sub" type="submit" class="btn" value="保存"/></li>
        </ul>
    </form>
    </div>



    <div id="di3" style="display:none;">
        <form action="/index.php/Home/Company/qualityadd" method="post" enctype="multipart/form-data">
        <table>
        <tr>
        <td>公司资质：请上传您的公司资质及荣誉证书，提升信誉</td>
        </tr>
        <tr>
        <td>
        <div style=" float:left; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="hidden" name="id" value="<?php foreach($arr as $v){ echo $v['company_id'];}?>"><input type="file" name="img"></div>
        <div style=" float:left; margin-left:15px; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="file" name="img1"></div>
        <div style=" float:left; margin-left:15px; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="file" name="img2"></div></td>
        </tr>
        </table>
        <input name="sub" type="submit" class="btn" value="保存" style="margin-left:150px;"/>
        </form>

        <br><br><br>
        <form action="/index.php/Home/Company/companyshow" method="post" enctype="multipart/form-data">
        <table>
        <tr>
        <td>公司展示：请上传您的公司办公或设备场景，提升信誉</td>
        </tr>
        <tr>
        <td>
        <div style=" float:left; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="hidden" name="id" value="<?php foreach($arr as $v){ echo $v['company_id'];}?>"><input type="file" name="img3"></div>
        <div style=" float:left; margin-left:15px; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="file" name="img4"></div>
        <div style=" float:left; margin-left:15px; width: 70px;    min-height: 70px;    max-height: 70px;    _height: 70px; border-style:solid; border-width:1px; border-color:gray;"><br/><input type="file" name="img5"></div></td>
        </tr>
        </table>
        <input name="sub" type="submit" class="btn" value="保存" style="margin-left:150px;" />
        </form>
    </div>
    
    </div>


</body>
<script type="text/javascript">


    function fun(){
        if(fun1()&&fun2()&&fun3()&&fun4()){
            return true;
        }else{
            return false;
        }
    }


    function fun1(){
        var company_person = document.getElementById('company_person').value;
        if(company_person==''){
            document.getElementById("span_person").innerHTML="联系人不能为空";
            document.getElementById("span_person").style.color='red';
            return false;
        }else{
            document.getElementById("span_person").innerHTML="";
            return true;
        }
    }



    function fun2(){
        var company_tel = document.getElementById('company_tel').value;
        if(company_tel==''){
            document.getElementById("span_tel").innerHTML="联系电话不能为空";
            document.getElementById("span_tel").style.color='red';
            return false;
        }else{
            document.getElementById("span_tel").innerHTML="";
            return true;
        }
    }



    function fun3(){
        var company_fax = document.getElementById('company_fax').value;
        if(company_fax==''){
            document.getElementById("span_fax").innerHTML="传真不能为空";
            document.getElementById("span_fax").style.color='red';
            return false;
        }else{
            document.getElementById("span_fax").innerHTML="";
            return true;
        }
    }



    function fun4(){
        var company_brief = document.getElementById('company_brief').value;
        if(company_brief==''){
            document.getElementById("span_brief").innerHTML="简介不能为空";
            document.getElementById("span_brief").style.color='red';
            return false;
        }else{
            document.getElementById("span_brief").innerHTML="";
            return true;
        }
    }



    function show(y){
        if(y==1){
             di1.style.display="block";
             di2.style.display="none";
             di3.style.display="none";
        }else if(y==2){
             di1.style.display="none";
             di2.style.display="block";
             di3.style.display="none";
         }else{
             di1.style.display="none";
             di2.style.display="none";
             di3.style.display="block";
         }
    }
</script>

</html>