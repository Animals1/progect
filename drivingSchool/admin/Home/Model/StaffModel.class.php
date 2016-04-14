<?php
/**
 *	员工表
 *	created by: yaobowen
 */
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
	//查询全部员工的信息
	public function selall(){
		return $this->select();
	}
	//查询一个员工的信息
	public function selone($id){
		return $this->where("staff_id = '$id'")->find();
	}
	//删除一个员工的信息
	public function delone($id){
		return $this->where("staff_id = '$id'")->delete();
	}
}

?>