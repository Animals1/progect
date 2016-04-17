<?php
/**
 * 人事模块
 * 作者：张捷
 */
namespace Home\Controller;
use Think\Controller;
class StaffController extends Controller {
    public function staff_add(){
    	$staff = D('staff');
    	$role = $staff->roleselect();
    	$coach = $staff->satffcoach();
    	$region = $staff->linkage();
    	$this->assign('role',$role);
        $this->assign('region',$region);
    	$this->assign('coach',$coach);
        $this->display('add');
    }
    public function area(){
    	$id = $_GET['id'];
    	$staff = D('staff');
    	$region = $staff->linkage($id);
    	echo json_encode($region);
    }
    public function adds(){
       $staff = D('staff');
       $area = $staff->area($_POST);
       if ($area['role'] == '1') {
           $id = $staff->iddeal($area);
           $data = $staff->dealtime($id);
       }else{
           $data = $staff->dealtime($area);
       }
       
    }
}