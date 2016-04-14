<?php
/**
	*@教练模块----个人中心
	*/
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	/**
	*@展示个人信息
	*/
    public function index(){
    	$this->display('personal_info');
        }
     /**
	*@展示请假管理
	*/
    public function leave(){
    	$this->display('leave');
        }   
     /**
	*@展示出勤信息
	*/ 
     public function attendance()
        {
        $this->display('attendance');
        } 
}