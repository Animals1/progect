<?php
namespace Home\Controller;
use Think\Controller;
class PersonalController extends Controller {
	/*
	*	@author:郭旭峰
	*	@module:管理员-个人中心
	*	@个人信息展示
	*/
	public function staffsele(){
		$staffid = session("staff_id");
		$data = D("staff");
		$arr = $data->staffsele($staffid);
		$this->assign();
		$this->display("");
	}

	/*
	*	@个人信息字符修改
	*/
	public function stafffieldsave(){
		$field = $_POST['field'];
		if($field==1){
			$field1 = "staff_curaddress";
			$data = D("staff");
			$arr = $data->stafffieldsave($field1);
		}else if($field==2){
			$field2 = "staff_tel";
			$data = D("staff");
			$arr = $data->stafffieldsave($field2);
		}else{
			$field3 = "staff_email";
			$data = D("staff");
			$arr = $data->stafffieldsave($field3);
		}
		
		if($arr){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}


	/*
	*	@出勤记录添加
	*/
	public function continuitydaysadd(){
		$thismonth=date('m');//获取当前月份
		
		if($thismonth<=$thismonth){
			//记录登陆天数记录
			$nowmonthday = date('t',time());//获取当前月份有多少天
			$thisday = date('d');//获取当前登陆为当月几号
			if($thisday<=$nowmonthday){
				$tomorrotime = strtotime(date('Y-m-d',strtotime('+1 day')));//获取明天凌晨时间戳
				$now = D("continuity");
				$nowtime = $now->descsele();
				$ntime = $nowtime['c_time'];//获取上一条数据的时间戳
				if($ntime>$tomorrotime){
					$data = D("continuity");
					$arr = $data->continuityadd();
					if($arr){
						echo "success";
					}else{
						echo "error";
					}
				}else{
					echo "已经出勤不可重复点击";
				}



			}else{
				//清空登陆天数记录
				$data = D("continuity");
				$arr = $data->continuitydeleall();
				
			}
		}else{
			//清空登陆天数记录
			$data = D("continuity");
			$arr = $data->continuitydeleall();
		}
	}


	/*
	*	查看出勤天数
	*/
	public function continuitydayssele(){
		$data = D("continuity");
		$arr = $data->continuitydayssele();
		$nowmonthday = $thismonth=date('m');
		$this->assign();
		$this->display("");
	}


	/*
	*	查询请假信息
	*/
	public function leaveabout(){
		$data = D("StaffLeave");
		$arr = $data->leaveabout();
		$this->assign();
		$this->display();
	}


	/*
	*	我要请假
	*/
	public function iwantgo(){
		$data = D("StaffLeave");
		$arr = $data->iwantgo();
		if($arr){
			//成功
		}else{
			//失败
		}
	}




	/*
	*	@BY 郭旭峰
	*	@用户管理-账号管理
	*	查询用户-角色表
	*/
	public function numbermanager(){
		$data = D("admin");
		$arr = $data->numbermanager();
		$this->assign();
		$this->display();
	}



	/*
	*	@BY 郭旭峰
	*	@用户管理-账号管理
	*	查询权限-角色表
	*/
	public function rolejurisdiction(){
		$data = D("privilege");
		$arr = $data->rolejurisdiction();
		$this->assign();
		$this->display("");
	}
}
?>