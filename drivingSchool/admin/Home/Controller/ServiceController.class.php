<?php
	/**
	*	@汽车服务----教练
	*	author：yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class ServiceController extends Controller {
	/**
	*	查询当前教练的全部换车记录信息，
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
	/**
	*	查询当前教练的全部油气申请信息
	*/
    public function oil(){
    	$name = "张三";
		$model = D('GasAdd');
		$type = $model->gasScreening();
		$arr = $model->getValue($name);
		print_r($arr);die;
    } 
/**
	*	删除一条油气记录
	*/
	public function deloil(){
		$id = '1';
		$where = "";
		$model = D('GasAdd');
		$arr = $model->delValue($where);
		print_r($arr);die;
		
	}
	/**
	*	添加一条油气记录
	*/
	public function addoil(){
		$arr = $_POST;
		$data = array();
		$model = D('GasAdd');
		$res = $model->addValue($data);
		print_r($res);die;
	}	
    /**
	*	维修记录
	*/
	public function repair(){
		$name = "张三";
		$model = D('CarRepair');
		$arr = $model->getValue($name);
		print_r($arr);die;
    }
	/**
	*	删除维修记录
	*/
    public function delrepair(){
		$where = "";
		$model = D('CarRepair');
		$arr = $model->delValue();
		print_r($arr);die;
    }
    /**
	*	删除维修记录
	*/
    public function addrepair(){
		$data = $_POST;
		$arr = array();
		$model = D('CarRepair');
		$arr = $model->addCarrepair($arr);
		print_r($arr);die;
    }  

}