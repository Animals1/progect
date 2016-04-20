<?php
namespace Home\Model;
use Think\Model;
class StaffLeaveModel extends Model {
	/*
 	*	个人中心-员工请假表
 	*	by:郭旭峰
 	*/
	
	
	/*
	*	员工请假表内容查询
	*	by  郭旭峰
	*/
	public function leaveabout(){
		
		
			$userid = $_COOKIE["userid"];
			$user = M('staff_leave');
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list =$user->page($p,6)->order('leave_starttime desc')->select();
            $count      = $user->where("work_id='$userid'")->count();
        	$page       = new \Think\Page($count,6);
        	$show       = $page->show();
            $arr = array($list,$show,$count,$p);
            return $arr;
	}

	/*
	*	我要请假
	*	by  郭旭峰
	*/
	public function iwantgolist(){
		$username = $_COOKIE["username"];
		//return $this->Table("staff")->where("staff_name='$username'")->select();
		return $this->Table("staff")->join('role ON staff.role_id = role.role_id')->where("staff_name='$username'")->select();
	}


	/*
	*	请假类型查看
	*	by  郭旭峰
	*/
	public function go(){
		return $this->Table("go")->select();
	}


	/*
	*	年份sele
	*	by  郭旭峰
	*/
	public function yearsele(){
		return $this->Table("year")->select();
	}

	/*
	*	月份sele
	*	by  郭旭峰
	*/
	public function monthsele(){
		return $this->Table("month")->select();
	}


	/*
	*	详情信息查看
	*	by 郭旭峰
	*/
	public function leaveaboutlook(){
		$userid = $_COOKIE["userid"];
		return $this->Table("staff_leave")->where("work_id='$userid'")->select();
	}


	public function leavelookidsee(){
		$id = $_GET['id'];
		return $this->Table("staff_leave")->where("leave_id='$id'")->select();
	}





	/*
	*	我要请假信息添加
	*	by 郭旭峰
	*/
	public function staffleaveadd(){
		//接收信息
		$workid = $_COOKIE['userid'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$leavedesc = $_POST['reason'];
		$leavestatus = 0;
		$leavetype = $_POST['type'];
		$leavedays = $_POST['days'];
		//echo $workid."<hr/>".$start."<hr/>".$end."<hr/>".$leavedesc."<hr/>".$leavestatus."<hr/>".$leavetype."<hr/>".$leavedays;
		//实现入库操作
		$data['work_id'] = $workid;
		$data['leave_starttime'] = $start;
		$data['leave_endtime'] = $end;
		$data['leave_desc'] = $leavedesc;
		$data['leave_status'] = $leavestatus;
		$data['leave_type'] = $leavetype;
		$data['leave_days'] = $leavedays;
		return $this->Table("staff_leave")->add($data);

	}


	/*
	*	撤销操作
	*	by 郭旭峰
	*/
	public function revoke(){
		$userid = $_COOKIE['userid'];
		return $this->Table("staff_leave")->order("leave_id desc")->where("work_id='$userid'")->select();
	}

	public function revokedele($leaveid){
		$data['leave_status'] = 1;
		return $this->Table("staff_leave")->where("leave_id='$leaveid'")->save($data);
	}



	/*
	*	请假搜索
	*	by  郭旭峰
	*/
	public function leavesearch($year,$month){
		//拼接查询的字符串
		$date = $year."-0".$month;
		//return $this->Table("staff_leave")->where("leave_starttime like'%$date%'")->select();

			$user = M('staff_leave');
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list =$user->page($p,6)->order('leave_starttime desc')->select();
            $count      = $user->where("leave_starttime like'%$date%'")->count();
        	$page       = new \Think\Page($count,6);
        	$show       = $page->show();
            $arr = array($list,$show,$count,$p);
            return $arr;

	}


}

?>