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
        $this->assign('id',$_POST['id']);
        $this->assign('coach',$coachs);
        $this->assign('search',$_POST);
        $this->assign('staff',$staffdata);
        $this->display('search');
    }
    public function salary()
    {

        $staff = D('staff');
        $month = $staff->month();
        $salary = $staff->salary();
        $this->assign('month',$month);
        $this->assign('salary',$salary);
        $this->display('salary'); 

    }
    public function sasearch()
    {
        $staff = D('staff');
        $month = $staff->month();
        $salary = $staff->searsalary($_POST);
        $this->assign('month',$month);
        $this->assign('salary',$salary);
        $this->assign('search',$_POST);
        $this->display('salary');
    }
    public function leave()
    {
        $staff = D('staff');
        $data = $staff->leave();
        $this->assign('data',$data);
        $this->display('leave');
    }
    /*
     * 请假页面搜索
     * 作者：张捷
     */
    public function leasearch()
    {
        $staff = D('staff');
        $data = $staff->leasearch($_POST);
        $this->assign('data',$data);
        $this->assign('search',$_POST);
        $this->display('leave');
    }
    /*
     * 教练学时
     * 作者：张捷
     */
    public function hours()
    {
        $staff = D('staff');
        $month = $staff->month();
        $hours = $staff->hours();
        $this->assign('month',$month);
        $this->assign('hours',$hours);
        $this->display('hours'); 
    }
    /*
     * 教练学时查询
     * 作者：张捷
     */
    public function hoursearch()
    {
        $staff = D('staff');
        $month = $staff->month();
        $hours = $staff->searhours($_POST);
        $this->assign('month',$month);
        $this->assign('search',$_POST);
        $this->assign('hours',$hours);
        $this->display('hours'); 
    }
    /*
     * 员工请假审核状态
     * 作者：张捷
     */
    public function leavestatus()
    {
        $staff = D('staff');
        print_r($_GET);exit;
        $id = $_GET['sid'];
        $id = $_GET['id'];
        $re = $staff->leavestatus($sid,$id);
        $month = $staff->month();
        $hours = $staff->hours();
        $this->assign('month',$month);
        $this->assign('hours',$hours);
        if($re){
          $this->success('审核成功',__CONTROLLER__."/leave",3);
        }else{
          $this->error('审核失败');
        }
    }
}