<?php
/**
	*@管理员模块----教练
*/
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
    public function index(){
    	$this->display('personal_info');
        }
    public function leave(){
    	$this->display('leave');
        }      
    public function attendance(){
    	$this->display('attendance');
        }
      
      

}