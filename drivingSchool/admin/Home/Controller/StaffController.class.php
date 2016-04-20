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
       $img = $staff->upload('img');
       $_POST['img'] = $img;
       $area = $staff->area($_POST);
       if ($area['role'] == '1') {
           $id = $staff->iddeal($area);
           $data = $staff->dealtime($id);
       }else{
           $data = $staff->dealtime($area);
       }
       $re = $staff->staffadd($data);
       if($re){
            $this->success('添加成功',__CONTROLLER__."/show",3);
        }else{
            $this->error('添加失败');
        }
    }
    public function show()
    {
        $staff = D('staff');
        
        $coach = $staff->staffcoachselect();
        $staffs = $staff->staffselect();
        $coachs = $staff->coachdatetime($coach);
        $staffdata = $staff->staffdatetime($staffs);
        $this->assign('coach',$coachs);
        $this->assign('staff',$staffdata);
        $this->display('show');
    }
    public function search()
    {
        $staff = D('staff');
        $data = $staff->staffsearch($_POST);
        $coach = $data[0];
        $staffs = $data[1];
        $coachs = $staff->coachdatetime($coach);
        $staffdata = $staff->staffdatetime($staffs);
        $this->assign('coach',$coachs);
        $this->assign('staff',$staffdata);
        $this->display('search');
    }
}