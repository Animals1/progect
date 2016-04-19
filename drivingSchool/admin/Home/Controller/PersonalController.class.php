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


	//判断是不是第一次打卡
	public function dakacoo(){
		if(empty($_COOKIE['dakatoken'])){
			cookie("dakatoken",123456,3600*24);
				echo "ok";die;
			}else{
				
				echo "no";die;
			}
	}



	public function continuitydaysadd(){
		/*
		//判断今天是否已经打卡
		$tomtime = strtotime(date('Y-m-d',strtotime('+1 day')));//获取明天凌晨时间戳
		$agotime = strtotime(date('Y-m-d',strtotime('-1 day')));//获取昨天凌晨时间戳
		$nows = D("continuity");
		$nowtimes = $nows->descsele();
		$ntimes = $nowtimes['time'];//获取上一条数据的时间戳*/

		//if($ntimes>$agotime&&$ntimes<$tomtime||$ntimes==''){
			//判断是否打卡
			if(empty($_COOKIE['dakatoken'])){
			$tomorroshijian = strtotime(date('Y-m-d',strtotime('+1 day')));//获取明天凌晨时间戳
			$nowshijian = time();
			$shijiancha = $tomorroshijian-$nowshijian;
			cookie("dakatoken",123456,$shijiancha);
			
			//根据数据库信息判断月份
			$nowt = D("continuity");
			$nowtimeis = $nowt->descsele();
			//print_r($nowtime);die;
			$xtime = $nowtimeis[0]['time'];//获取上一条数据的时间戳
			$lastmonth = date("m",$xtime);
			$thismonth=date('m');//获取当前月份
			if($thismonth<=$lastmonth||$xtime==''){
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
					if($ntime==''||$ntime<$tomorrotime){
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
					//先把记录入库然后在清楚
					$danum = D("continuity");
					$dakanum = $danum->continuitydayssele();//打卡多少天记录
					$nowmonth = date("m")-1;
					//添加到记录
					$addnum = D("continuity");
					$addnums = $addnum->dakanumadd($dakanum,$nowmonth);
					if($addnums){
						//清空登陆天数记录
						$data = D("continuity");
						$arr = $data->continuitydeleall();
						if($arr){
							echo "<script>alert('新月份数据更新，请重新打卡！');location.href='".__MODULE__."/Personal/chuqin'</script>";
						}
					}
					
				
				}
			}else{
					//先把记录入库然后在清楚
					$danum = D("continuity");
					$dakanum = $danum->continuitydayssele();//打卡多少天记录
					$nowmonth = date("m")-1;
					//添加到记录
					$addnum = D("continuity");
					$addnums = $addnum->dakanumadd($dakanum,$nowmonth);

					if($addnums){
						//清空登陆天数记录
						$data = D("continuity");
						$arr = $data->continuitydeleall();
						if($arr){
						echo "<script>alert('新月份数据更新，请重新打卡！');location.href='".__MODULE__."/Personal/chuqin'</script>";
						}
					}
			}


			}else{
				echo "<script>alert('您今日已经打卡，请明天再来吧~');location.href='".__MODULE__."/Personal/chuqin'</script>";
				
			}
			

		/*}else{
			echo "<script>alert('您今日已经打卡，请明天再来吧~');location.href='".__MODULE__."/Personal/chuqin'</script>";
		}*/

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
	public function iwantgolist(){
		$data = D("StaffLeave");
		$arr = $data->iwantgolist();
		$arr1 = $data->go();
		$this->assign("arr",$arr);
		$this->assign("arr1",$arr1);
		$this->display("iwantgolist");
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
	*	by  郭旭峰
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




	/*
	*	员工请假管理
	*	by  郭旭峰
	*/
	public function personleave(){
		//查询年份
		$data = D("StaffLeave");
		$arr = $data->yearsele();
		//查询月份
		$data1 = D("StaffLeave");
		$arr1 = $data1->monthsele();
		//查看请假表
		$data2 = D("StaffLeave");
		$arr2 = $data2->leaveabout();
		$arr3 = $arr2[0];
		$page = $arr2[1];
		$count = $arr2[2];
		$p = $arr2[3];
		$this->assign("arr",$arr);
		$this->assign("arr1",$arr1);
		$this->assign("arr2",$arr3);
		$this->assign("page",$page);
		$this->assign("count",$count);
		$this->assign("p",$p);
		$this->display("personleave");
	}


	/*
	*	请假详情查看
	*	by  郭旭峰
	*/
	public function leavelook(){
		//查看请假表
		$data2 = D("StaffLeave");
		$arr2 = $data2->leaveaboutlook();
		$this->assign("arr",$arr2);
		$this->display("leavelook");
	}


	/*
	*	我要请假信息添加
	*	by 郭旭峰
	*/
	public function staffleaveadd(){
		$data = D("StaffLeave");
		$arr = $data->staffleaveadd();
		if($arr){
			echo "<script>alert('提交成功');location.href='".__MODULE__."/Personal/personleave'</script>";
		}else{
			echo "<script>alert('提交失败');location.href='".__MODULE__."/Personal/iwanttogolist'</script>";
		}
	}


	/*
	*	撤销操作
	*	by 郭旭峰
	*/
	public function revoke(){
		$data = D("StaffLeave");
		$arr = $data->revoke();
		$leaveid = $arr[0]['leave_id'];
		$arr1 = $data->revokedele($leaveid);
		if($arr1){
			echo "<script>alert('撤销成功');location.href='".__MODULE__."/Personal/personleave'</script>";
		}else{
			echo "<script>alert('撤销失败');location.href='".__MODULE__."/Personal/personleave'</script>";
		}
	}


	/*
	*	请假搜索
	*	by  郭旭峰
	*/
	public function leavesearch(){
		//接收信息
		$year = $_POST['year'];
		$month = $_POST['month'];
		if($year==''&&$month==''){
			echo "<script>alert('请选择年限');location.href='".__MODULE__."/Personal/personleave'</script>";
		}else if($year==''||$month==''){
			echo "<script>alert('请选齐年限日期');location.href='".__MODULE__."/Personal/personleave'</script>";
		}else{
			$y = 1;
			$m = 1;
			$data = D("StaffLeave");
			$arr2 = $data->leavesearch($year,$month);
			$arr3 = $arr2[0];
			$page = $arr2[1];
			$count = $arr2[2];
			$p = $arr2[3];
			$this->assign("arr2",$arr3);
			$this->assign("page",$page);
			$this->assign("count",$count);
			$this->assign("p",$p);
			$this->assign("y",$y);
			$this->assign("m",$m);
			$this->assign("year",$year);
			$this->assign("month",$month);
			$this->display("personleave");
		}
		
	}




	/*
	*	待办事项
	*	by 郭旭峰
	*/
	public function waitthing(){
		$data = D("Waitthing");
		$arr = $data->waitthing();
		$this->assign("arr",$arr);
		$this->display("waitthing");
	}
	
}
?>