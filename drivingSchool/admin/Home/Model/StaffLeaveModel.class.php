<?php
/**
 *	员工请假表
 *	created by: yaobowen
 */
namespace Home\Model;
use Think\Model;
class StaffLeaveModel extends Model {
	
	//查询全部请假表的信息
	public function selall(){
		return $this->select();
	}
	//删除一个请假表的信息
	public function delone($id){
		return $this->where("staff_id = '$id'")->delete();
	}
}

?>