<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  window.location.href="/index.php/Home/Usermanager/nameaddlist";
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
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


</head>


<body>

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">用户管理</a></li>
    <li><a href="#">账号管理</a></li>
    <li><a href="#">新建账号</a></li>
    </ul>
    </div>

    <br><br>
    <div style="margin-left:25px;">
        <form action="/index.php/Home/Usermanager/roleadd" method="post" onsubmit="return fun();">
            <table class="imagetable">
                <tr>
                    <th>员工姓名：</th>
                    <td><input type="text" name="staff_name" id="staff_name" onblur="fun1();"><span id="span_staffname"></span></td>
                </tr>

                <tr>
                    <th>账号：</th>
                    <td><input type="text" name="admin_name" id="admin_name" onblur="fun2();"><span id="span_adminname"></span></td>
                </tr>

                <tr>
                    <th>密码：</th>
                    <td><input type="password" name="admin_pwd" id="admin_pwd" onblur="fun3();"><span id="span_admin_pwd"></span></td>
                </tr>

                <tr>
                    <th>重复密码：</th>
                    <td><input type="password" name="sadmin_pwd" id="sadmin_pwd" onblur="fun4();"><span id="span_sadminpwd"></span></td>
                </tr>

                <tr>
                    <th>邮箱：</th>
                    <td><input type="text" name="admin_email" id="admin_email" onblur="fun5();"><span id="span_adminemail"></span></td>
                </tr>

                <tr>
                    <th>手机号码：</th>
                    <td><input type="text" name="admin_tel" id="admin_tel" onblur="fun6();"><span id="span_admintel"></span></td>
                </tr>

                <tr>
                    <th>状态：</th>
                    <td>
                    	<select name="status" id="status">
                    		<option value="">---请选择---</option>
                    		<option value="1">有效</option>
                    		<option value="0">无效</option>
                    	</select>
                    </td>
                </tr>

                <tr>
                    <th>用户角色：</th>
                    <td>
                        <input type="checkbox" name="role[]" id="role" value="1">教练
                        <input type="checkbox" name="role[]" id="role" value="2">学员
                        <input type="checkbox" name="role[]" id="role" value="3">管理员
                        <input type="checkbox" name="role[]" id="role" value="4">行政
                        <input type="checkbox" name="role[]" id="role" value="5">人事
                        <input type="checkbox" name="role[]" id="role" value="6">财务
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Usermanager/usermanagerlist" style=" text-decoration: none;"><input type="button" value="取消"></a></td>
                </tr>
            </table>
        </form>
    </div>
  
</body>

<script type="text/javascript">

	function fun(){
		if(fun1()&&fun2()&&fun3()&&fun4()&&fun5()&&fun6()){
			return true;
		}else{
			return false;
		}
	}


	function fun1(){
		var staff_name = document.getElementById("staff_name").value;
		if(staff_name==''){
			document.getElementById("span_staffname").innerHTML="员工姓名不能为空";
            document.getElementById("span_staffname").style.color='red';
            return false;
		}else{
			document.getElementById("span_staffname").innerHTML="";
            return true;
		}
	}


	function fun2(){
		var admin_name = document.getElementById("admin_name").value;
		if(admin_name==''){
			document.getElementById("span_adminname").innerHTML="员工账号不能为空";
            document.getElementById("span_adminname").style.color='red';
            return false;
		}else{
			document.getElementById("span_adminname").innerHTML="";
            return true;
		}
	}


	function fun3(){
		var admin_pwd = document.getElementById("admin_pwd").value;
		if(admin_pwd==''){
			document.getElementById("span_admin_pwd").innerHTML="密码不能为空";
            document.getElementById("span_admin_pwd").style.color='red';
            return false;
		}else{
			document.getElementById("span_admin_pwd").innerHTML="";
            return true;
		}
	}

	
	function fun4(){
		var sadmin_pwd = document.getElementById("sadmin_pwd").value;
		var admin_pwd = document.getElementById("admin_pwd").value;
		if(sadmin_pwd==''){

			document.getElementById("span_sadminpwd").innerHTML="重复密码不能为空";
            document.getElementById("span_sadminpwd").style.color='red';
            return false;
			
		}else if(sadmin_pwd!=admin_pwd){
			document.getElementById("span_sadminpwd").innerHTML="与设置密码不一致";
            document.getElementById("span_sadminpwd").style.color='red';
            return false;
		}else{
			document.getElementById("span_sadminpwd").innerHTML="";
            return true;
		}
	}


	
	function fun5(){
		var admin_email = document.getElementById("admin_email").value;
		if(admin_email==''){
			document.getElementById("span_adminemail").innerHTML="邮箱不能为空";
            document.getElementById("span_adminemail").style.color='red';
            return false;
		}else{
			document.getElementById("span_adminemail").innerHTML="";
            return true;
		}
	}



	
	function fun6(){
		var admin_tel = document.getElementById("admin_tel").value;
		if(admin_tel==''){
			document.getElementById("span_admintel").innerHTML="手机号不能为空";
            document.getElementById("span_admintel").style.color='red';
            return false;
		}else{
			document.getElementById("span_admintel").innerHTML="";
            return true;
		}
	}

</script>
</html>