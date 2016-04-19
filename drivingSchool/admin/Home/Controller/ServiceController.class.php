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
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		// $rolename = '最高管理';
		if($rolename == '教练'){
			$models = D('Staff');
			$res = $models->selcoachid($name);
			$coachid = $res['coach_id'];
			
			$model = D('CarReplace');
			$where = "replace_name = '$coachid'";
			$data = $model->getValue($where);
			$page = $data['0'];
			$arr = $data['1'];
			foreach($arr as $k=>$v){
				$last_id = $v['replace_number_after'];
				$reseult[$k] = $model->getlastnu($last_id);
				$arr[$k]['replace_number_after_num'] = $reseult[$k]['car_number'];
			}
			// print_r($arr);die;
			
			$status = '';
			$this->assign('status',$status);
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('changecar');
		}else if($rolename == '最高管理'){
			$model = D('CarReplace');
			$where = "";
			$data = $model->getValue($where);
			$page = $data['0'];
			$arr = $data['1'];
			foreach($arr as $k=>$v){
				$last_id = $v['replace_number_after'];
				$reseult[$k] = $model->getlastnu($last_id);
				$arr[$k]['replace_number_after_num'] = $reseult[$k]['car_number'];
			}
			$status = '';
			$type = '1';
			$this->assign('status',$status);
			$this->assign('type',$type);
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('changecar');
		}
		
		
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
	*	关于审核状态的搜索
	*/
	public function searchcondition(){
		$name = $_COOKIE['username'];
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		// $rolename = '最高管理';
		
		$status = $_GET['value'];
		$model = D('CarReplace');
		if($status == ''){
			$where = '';
		}
		else if($status == '0'){
			$where = "replace_status = '$status'";
		}
		else if($status == '1'){
			$where = "replace_status = '$status'";
		}
		else{
			echo "<script>alert('不合法');history.go(-1);</script>";die;
		}
		
		$data = $model->getValue($where);
		$page = $data['0'];
		$arr = $data['1'];
		if($rolename == '最高管理'){
			$type = '1';
			$this->assign('type',$type);
			$this->assign('status',$status);
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('changecar');
		}
		else
		{
			$this->assign('status',$status);
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('changecar');
		}
		
	}
	/**
	*	添加一条换车记录
	*/
	public function addrepaircar(){
		if($_POST){
			$name = $_COOKIE['username'];
			$models = D('Staff');
			$res = $models->selcoachid($name);
			$model = D('CarReplace');
			$arr['replace_time'] = time();
			$arr['replace_name'] = $res['coach_id'];
			$arr['replace_number_before'] = $_POST['replace_number_before'];
			$arr['replace_number_after'] = $_POST['replace_number_after'];
			$arr['replace_reason'] = $_POST['replace_reason'];
			$arr['deal_name'] = "";
			$arr['replace_status'] = "0";
			$res = $model->add($arr);
			if($res){
				$this->redirect('Service/getrepaircar');
			}
			else
			{
				echo "<script>alert('申请提交失败');history.go(-1);</script>";die;
			}
		}
		else
		{
				$model = D('Car');
				$arr = $model->vehicles();
				$this->assign('arr',$arr);
				$this->display(addrepaircar);
		}
	}
	/**
	*	查询当前教练的全部油气申请信息
	*/
    public function oil(){
    	$name = $_COOKIE['username'];
		$where = "applicant_name = '$name'";
		$model = D('GasAdd');
		$arr = $model->getValue($where);
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
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		$rolename = '最高管理';
		if($rolename == '教练'){
			$model = D('CarRepair');
			$where = "repair_name = '$name'";
			$data = $model->getValue($where);
			$page = $data['0'];
			$arr = $data['1'];
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('repairlist');
		}else if($rolename == '最高管理'){
			$model = D('CarRepair');
			$where = '';
			$data = $model->getValue($where);
			$page = $data['0'];
			$arr = $data['1'];
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('repairlist');
		}
		
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