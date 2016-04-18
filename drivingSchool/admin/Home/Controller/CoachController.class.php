<?php
	/**
	*	@管理员模块----教练
	*	author：yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
	/**
	*	查询当前教练的信息，返回一维数组
	*/
	public function personal_info(){
		$name = $_COOKIE['username'];
		$model = D('Staff');
		$arr = $model->getvalue($name);
		// print_r($arr);die;
		$this->assign('arr',$arr);
    	$this->display('personal_info');
		
	}
	/**
	*	查询关于该教练的评价
	*/
    public function award(){
		
		$id = "1";
		$model = D('Review');
		$arr = $model->getvalue($id);
		$show = $arr['0'];
		$list = $arr['1'];
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('award'); 

        }
    public function leave(){
    	$this->display('leave');
        }      
    public function attendance(){
    	$this->display('attendance');
        }
      
      

}