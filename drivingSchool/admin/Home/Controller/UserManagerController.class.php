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
    	//print_r($arr);die;
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
      
      

}