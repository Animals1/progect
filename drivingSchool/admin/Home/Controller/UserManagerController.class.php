<?php
/**
	*@管理员模块----用户管理
    *   by 郭旭峰
*/
namespace Home\Controller;
use Think\Controller;
class UsermanagerController extends Controller {

    /*
    *   用户管理html展示
    */
    public function usermanagerlist(){
    	//联查admin/role/admin_role
    	$data = D("admin");
    	$arr = $data->usermanagerlist();
    	$arr1 = $arr[0];//数据
		$page = $arr[1];//页数
		$count = $arr[2];//总数
		$p = $arr[3];//页码
    	$this->assign("arr",$arr1);
    	$this->assign("page",$page);
    	$this->assign("count",$count);
    	$this->assign("p",$p);
        $this->display("usermanagerlist");
    }


    /*
    *	账号管理删操作
	*	by  郭旭峰
    */
    public function usermanagerlistiddele(){
    	$data = D("admin");
    	$arr = $data->usermanagerlistiddele();
    	if($arr){
    		echo "<script>alert('删除成功');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
    	}else{
    		echo "<script>alert('sorry，操作失败了');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
    	}
    }


    /*
    *   重置密码
    *   by  郭旭峰
    */
    public function pwdreset(){
        $data = D("admin");
        $arr = $data->pwdreset();
        if($arr){
            echo "<script>alert('密码重置成功，默认修改为:666666');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
        }else{
            echo "<script>alert('密码已经是初始化密码');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
        }
    }


    /*
    *   密码修改功能
    *   by 郭旭峰
    */
    public function aboutsavelist(){
        echo "<script>alert('系统升级维护中，暂停使用...');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
    }


    /*
    *   新建账号
    *   by  郭旭峰
    */
    public function nameaddlist(){
        $this->display("nameaddlist");
    }



    /*
    *   添加角色
    *   by  郭旭峰
    */
    public function roleadd(){
        //接收信息方便入库传值
        $staff_name = $_POST['staff_name'];//员工姓名
        $admin_name = $_POST['admin_name'];//账号
        $admin_pwd = $_POST['admin_pwd'];
        $intermediateSalt = md5($admin_pwd);
        $salt = substr($intermediateSalt, 0, 6);
        $nupwd = hash("sha256", $admin_pwd . $salt);//最终密码
        $admin_email = $_POST['admin_email'];//邮箱
        $admin_tel = $_POST['admin_tel'];//电话
        $status = $_POST['status'];//是否有效
        $role = array($_POST['role']);
        foreach ($role as $key => $value) {
            $roleabout = $value;//角色
        }

        //入库操作
        $data = D("Admin");
        $arr = $data->admincreate($admin_name,$nupwd,$admin_email,$admin_tel,$status);
        if($arr){
            $arr1 = $data->adminidsele();
            $admin_id = $arr1[0]['admin_id'];

            //$arr2 = $data->adminroleadd($admin_id,$roleabout);
            //添加入库
            $da = array();
            foreach ($roleabout as $key=>$value) {
                $da[$key]['admin_id'] = $admin_id;
                $da[$key]['role_id'] = $value;
            }

            $db2=D("admin_role");
            $arr2=$db2->addAll($da);

            $arr3 = $data->staffnameadd($staff_name);
            if($arr3){
                echo "<script>alert('账户创建成功');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
            }else{
                echo "<script>alert('账户创建失败');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
            }

        }else{
            echo "<script>alert('账户创建失败');location.href='".__MODULE__."/Usermanager/usermanagerlist'</script>";
        }
        

    }
      
      

}