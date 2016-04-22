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
		if($_POST['id']){
			$id = $_POST['id'];
			$where = "replace_id='$id'";
			$model = D('CarReplace');
			$arr = $model->delValue($where);
			echo $arr;
		}else if($_POST['reapairid']){
			$id = $_POST['reapairid'];
			$where = "repair_id='$id'";
			$model = D('CarRepair');
			$arr = $model->delValue($where);
			echo $arr;
			
		}
		
		
		
	}
	/**
	*	修改一条数据
	*/
	public	function updaterepaircar(){
		// 获取申请
		$id = $_GET['id'];
		$model = D('CarReplace');
		$where = "replace_id = '$id'";
		$arr = $model->getoneValue($where);
		
		if($_POST){
			// print_r($_POST);die;
			$replace_id = $_POST['replace_id'];
			// echo $replace_id;die;
			$replace_number_before = $_POST['replace_number_before'];
			$replace_number_after = $_POST['replace_number_after'];
			$replace_reason = $_POST['replace_reason'];
			$status = $_POST['status'];
			
			$car_replace = D('CarReplace');
			$arr['deal_name'] = $_COOKIE['username'];
			$arr['replace_status'] = "1";
			$res = $car_replace->where("replace_id = '$replace_id'")->save($arr);
			$car = D('Car');
			$sta['car_status'] = $status; 
			$res1 = $car->where("car_id = '$replace_number_after'")->save($sta);
			
			
			$this->redirect("Service/getrepaircar");
			
			
			
		}
		//车牌号
		$car = D('Car');
		$car_num = $car->vehicles();
		// 车辆审核状态
		$status = D('CarStatus');
		$total_status = $status->getallValue();
		
		
		$this->assign('status',$total_status);
		$this->assign('arr',$arr);
		$this->assign('data',$car_num);
		$this->display('uchangecar');
	}
	
	/**
	*	关于审核状态的搜索
	*/
	public function searchcondition(){
		
		if($_GET['value']){
			$name = $_COOKIE['username'];
			$role = D("admin");
			$isrole = $role->isrole();
			$rolename = $isrole[0]["role_name"];
			// $rolename = '最高管理';
			
			$status = $_GET['value'];
			$model = D('CarReplace');
			$models = D('Staff');
			$res = $models->selcoachid($name);
			$coachid = $res['coach_id'];
			if($status == ''){
				$where = "replace_name = '$coachid'";
			}
			else if($status == '0'){
				$where = "replace_status = '$status' && replace_name = '$coachid'";
			}
			else if($status == '1'){
				$where = "replace_status = '$status' && replace_name = '$coachid'";
			}
			else{
				echo "<script>alert('不合法');history.go(-1);</script>";die;
			}
			
			
			
			$model = D('CarReplace');
			$data = $model->getValue($where);
			$page = $data['0'];
			$arr = $data['1'];
			foreach($arr as $k=>$v){
				$last_id = $v['replace_number_after'];
				$reseult[$k] = $model->getlastnu($last_id);
				$arr[$k]['replace_number_after_num'] = $reseult[$k]['car_number'];
			}
			
			
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
		else
		{
			$name = $_COOKIE['username'];
			$role = D("admin");
			$isrole = $role->isrole();
			$rolename = $isrole[0]["role_name"];
			$rolename = '最高管理';
			$status = $_GET['status'];
			if($status == ''){
				$where = "";
			}
			else if($status == '1'){
				$where = "car_repair.repair_statusid = '$status'";
			}
			else if($status == '2'){
				$where = "car_repair.repair_statusid = '$status'";
			}
			else{
				echo "<script>alert('不合法');history.go(-1);</script>";die;
			}
			// print_r($where);die;
			$car_repair = D('CarRepair');
			$data = $car_repair->getValue($where);
			$arr = $data['1'];
			$page = $data['0'];
			// print_r($arr);die;
			if($rolename == '最高管理'){
				$type = '1';
				$this->assign('type',$type);
				$this->assign('status',$status);
				$this->assign('arr',$arr);
				$this->assign('page',$page);
				$this->display('repairlist');
			}
			else
			{
				$this->assign('status',$status);
				$this->assign('arr',$arr);
				$this->assign('page',$page);
				$this->display('repairlist');
			}
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
    	// 汽油类型表
		$Gas_type = D('GasType');
		$Type = $Gas_type->getValue();
		// 月份表
		$Gas_month = D('GasMonth');
		$Month = $Gas_month->getValue();
		// 查询出月份，并转换成指定格式
		// $month = "'1月', '2月', '3月','4月'";
		foreach($Month as $k=>$m){
			if(($k+1)==count($Month)){
				$month .= "'".$m['m_name']."'";
			}
			else if($k == 0)
			{
				$month .= "'".$m['m_name']."',";	
			}
			else{
				$month .= "'".$m['m_name']."',";
			}
			
		}
		//查询出指定月份下的各个类型的油气数量
		$Gas_num = D('GasNum');
		$Num = $Gas_num->getValue();
		// print_r($Num);die;
		foreach($Num as $k=>$n){
			if($n['gas_type_id'] == ($k+1)){
				$arr[] = $n['gas_type_name'];
			}
			else
			{
				
			}
		}
		// print_r($arr);die;
		$data = array('0'=>"suiyuan",'1'=>"suixin",'2'=>"sui");
		
		$this->assign('month',$month);
		$this->assign('data',$data);
		$this->display('oillist');
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
		// $rolename = '最高管理';
		if($rolename == '教练'){
			$model = D('CarRepair');
			$where = "repair_name = '$name'";
			// echo "suixin";die;
			$data = $model->getValue($where);
			// print_r($data);die;
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
			$type = '1';
			$this->assign('type',$type);
			$this->assign('arr',$arr);
			$this->assign('page',$page);
			$this->display('repairlist');
		}
		
    }
	/**
	*	审核状态
	*/
    public function updaterepair(){
		$id = $_GET['id'];
		$model = D('CarRepair');
		$where = "repair_id = '$id'";
		$arr = $model->getoneValue($where);
		// print_r($arr);die;
		//车辆状态
		$car_status = D('RepairStatus');
		$status = $car_status->getValue();
		// print_r($status);die;
		//车牌号
		$car = D('Car');
		$car_num = $car->vehicles();
		
		//审核状态修改入库
		if($_POST){
			// print_r($_POST);die;
			$car_repair = D('CarRepair');
			$repair_id = $_POST['repair_id'];
			$carpair['repair_rename'] = $_COOKIE['username'];
			$carpair['repair_retime'] = time();
			$carpair['repair_status'] = $_POST['status'];
			$res = $car_repair->where("repair_id = '$repair_id'")->save($carpair);
			// $status = $_POST['status'];
			if($res){
				$this->redirect('Service/repair');
			}
			else
			{
				echo "<script>alert('修改失败');history.go(-1);</script>";die;
			}
		}
		
		$this->assign('car',$car_num);
		$this->assign('car_status',$status);
		$this->assign('arr',$arr);
		$this->display('urepair');
		
    }
    /**
	*	添加一条维修记录
	*/
    public function addrepair(){
		if($_POST){
			$name = $_COOKIE['username'];
			$models = D('Staff');
			$res = $models->selcoachid($name);
			$arr['repair_coachname'] = $res['coach_id'];
			$arr['repair_carid'] = $_POST['repair_car'];
			$arr['repair_desc'] = $_POST['replace_reason'];
			$arr['repair_name'] = $name;
			$arr['record_time'] = time();
			$arr['repair_statusid'] = "2";
			$repair = D('CarRepair');
			$res = $repair->add($arr);
			if($res){
				$this->redirect('Service/repair');
			}
			else
			{
				echo "<script>alert('申请提交失败');history.go(-1);</script>";die;
			}
		}
		
		//车牌号
		$car = D('Car');
		$car_num = $car->vehicles();
		
		$this->assign('car',$car_num);
		$this->display('addrepair');
    }  

}