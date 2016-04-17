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
	*	出勤html显示
	*	by  郭旭峰
	*/
	public function chuqin(){
		$data = D("continuity");
		$arr = $data->continuitydayssele();
		$this->assign("arr",$arr);
		$this->display("chuqin");
	}


	/*
	*	@出勤记录添加
	*/
	public function continuitydaysadd(){
		//根据数据库信息判断月份
		$nowt = D("continuity");
		$nowtimeis = $nowt->descsele();
		//print_r($nowtime);die;
		$xtime = $nowtimeis[0]['time'];//获取上一条数据的时间戳
		$lastmonth = date("m",$xtime);
		$thismonth=date('m');//获取当前月份
		if($thismonth<=$lastmonth){
			//记录登陆天数记录
			$nowmonthday = date('t',time());//获取当前月份有多少天
			$thisday = date('d');//获取当前登陆为当月几号
			if($thisday<=$nowmonthday){
				$tomorrotime = strtotime(date('Y-m-d',strtotime('+1 day')));//获取明天凌晨时间戳
				$now = D("continuity");
				$nowtime = $now->descsele();
				//print_r($nowtime);die;
				$ntime = $nowtime[0]['time'];//获取上一条数据的时间戳
				//echo $ntime;die;
				if($ntime==''||$ntime>$tomorrotime){
					$data = D("continuity");
					$arr = $data->continuityadd();
					if($arr){
						echo "<script>alert('打卡成功！');location.href='".__MODULE__."/Personal/chuqin'</script>";
					}else{
						echo "<script>alert('打卡失败');location.href='".__MODULE__."/Personal/chuqin'</script>";
					}
				}else{
					echo "<script>alert('您今日已经打卡，请明天再来吧~');location.href='".__MODULE__."/Personal/chuqin'</script>";
				}



			}else{
				//清空登陆天数记录
				$data = D("continuity");
				$arr = $data->continuitydeleall();
				if($arr){
					echo "<script>alert('新月份数据更新，请重新打卡！');location.href='".__MODULE__."/Personal/chuqin'</script>";
				}
				
			}
		}else{
			//清空登陆天数记录
			$data = D("continuity");
			$arr = $data->continuitydeleall();
			if($arr){
				echo "<script>alert('新月份数据更新，请重新打卡！');location.href='".__MODULE__."/Personal/chuqin'</script>";
			}
		}
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



	/*
	*	个人中心-个人信息
	*	by 郭旭峰
	*/
	public function everyoneabout(){
		$data = D("staff");
		$arr = $data->everyoneabout();
		$this->assign("arr",$arr);
		$this->display("everyoneabout");
	}



	/*
	*	个人信息-字段修改显示界面
	*/
	public function showupdatefield(){
		$field = $_GET["field"];
		$data = D("staff");
		$arr = $data->showupdatefield();
		$this->assign("field",$field);
		$this->assign("arr",$arr);
		$this->display("showupdatefield");
	}


	/*
	*	个人信息字段的修改
	*	by  郭旭峰
	*/
	public function updatefield(){
		$field = $_POST["field"];
		$data = D("staff");
		$arr = $data->updatefield($field);
		if($arr){
			echo "<script>alert('修改成功');location.href='".__MODULE__."/Personal/everyoneabout'</script>";
		}else{
			$this->error("请检查您的操作内容!");
		}
	}
}
?>