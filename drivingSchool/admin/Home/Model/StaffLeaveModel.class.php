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
	*/
	public function leaveabout(){
		return $this->Table("staff_leave")->select();
	}

	/*
	*	我要请假
	*/
	public function iwantgo(){
		//接收信息
		$data[""] = ;
		return $this->Table("staff_leave")->add($data);
	}
}

?>