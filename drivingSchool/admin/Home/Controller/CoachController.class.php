<?php
/**
	*@管理员模块----教练
*/
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
	/**
	*	查询当前教练的信息，返回一维数组
	*	author：yaobowen
	*/
	public function personal_info(){
		$name = "张三";
		$model = D('Staff');
		$arr = $model->getvalue($name);
		$this->assign('arr',$arr);
    	$this->display('personal_info');
		
	}
    public function index(){
		$model = D('Staff');
		$arr = $model->getvalue();
		print_r($arr);die;
    	$this->display('personal_info');
        }
    public function leave(){
    	$this->display('leave');
        }      
    public function attendance(){
    	$this->display('attendance');
        }
      
      

}