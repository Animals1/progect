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
		$name = $_COOKIE['username'];
		$model = D('CarReplace');
		$data = $model->getValue($name);
		$page = $data['0'];
		$arr = $data['1'];
		$this->assign('arr',$arr);
		$this->assign('page',$page);
    	$this->display('changecar');
		
	}
	/**
	*	删除一条数据
	*/
	public function delrepaircar(){
		$id = $_POST['id'];
		$where = "replace_id='$id'";
		$model = D('CarReplace');
		$arr = $model->delValue($where);
		echo $arr;
		
	}
	/**
	*	修改一条数据
	*/
	public	function updaterepaircar(){
		$id = $_GET['id'];
		$model = D('CarReplace');
		$arr = $model->getoneValue($id);
		
		if($_POST){
			$replace_name = $_POST['replace_name'];
			$replace_number_before = $_POST['replace_number_before'];
			$replace_number_after = $_POST['replace_number_after'];
			$replace_reason = $_POST['replace_reason'];
			$deal_name = $_POST['deal_name'];
			
			if($replace_name == $arr['replace_name']  & $replace_number_before == $arr['replace_number_before'] 
			& $replace_number_after ==$arr['replace_number_after'] & $replace_reason == $arr['replace_reason'] 
			& $deal_name == $arr['deal_name']){
				echo "<script>alert('没有修改，不能提交~');window.history.back(-1);</script>";die;
			}
			
			$data['replace_name'] = $replace_name;
			$data['replace_number_before'] = $replace_number_before;
			$data['replace_number_after'] = $replace_number_after;
			$data['replace_reason'] = $replace_reason;
			$data['deal_name'] = $deal_name;
			$data['replace_time'] = time();
			
			
			
			$model = D('CarReplace');
			$res = $model->add($data);
			if($res){
				$this->redirect("Service/getrepaircar");
			}
			else
			{
				echo "<script>alert('添加失败');window.history.back(-1);</script>";die;
			}
		}
		
		$this->assign('data',$arr);
		$this->display('uchangecar');
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
		$name = $_COOKIE['username'];
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