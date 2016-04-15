<?php
	/**
	*	@汽车服务----教练
	*	author：yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class ServiceController extends Controller {
	/**
	*	查询当前教练维修记录的全部信息，
	*/
	public function getrepaircar(){
		$name = "张三";
		$model = D('CarReplace');
		$arr = $model->getValue($name);
		print_r($arr);die;
		
	}
	/**
	*	删除一条数据
	*/
	public function delrepaircar(){
		$id = '1';
		$where = "";
		$model = D('CarReplace');
		$arr = $model->delValue($where);
		print_r($arr);die;
		
	}
	/**
	*	添加一条维修记录
	*/
	public function addrepaircar(){
		$arr = $_POST;
		$data = array();
		$model = D('CarReplace');
		$res = $model->addValue($data);
		print_r($res);die;
	}
	
    public function oil(){
    	echo "oil";die;
        }      
    public function repair(){
		echo "repair";die;
        }
      
      

}