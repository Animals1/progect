<?php
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
	/*
	*	@author:郭旭峰
	*	@module:管理员-个人中心
	*	@个人信息
	*/
	public function staffsele($staffid){
		return $this->Table("staff")->join('role ON staff.role_id = role.role_id')->where("staff_id=$staffid")->select();
	}

	/*
	*	@个人信息字符修改
	*/
	public function stafffieldsave($field){
		if($field=="staff_curaddress"){
			$province = $_POST['province'];//省
			$city = $_POST['city'];//市
			$county = $_POST['county'];//县
			$other = $_POST['other'];//备注
			$newstaffcuraddress = $province.$city.$county.$other;
			return $this->Table("staff")->where("$field=$newstaffcuraddress")->update();
		}else if($field=="staff_tel"){
			$newstafftel = $_POST['staff_tel'];
			return $this->Table("staff")->where("$field=$newstafftel")->update();
		}else{
			$newstaffemail = $_POST["staff_email"];
			return $this->Table("staff")->where("$field=$newstaffemail")->update();
		}
		
	}
	
	/*
	 * 员工地区联动查询
	 * 作者：张捷
	 */
	public function linkage($id){

		$db=D('area');
		$rows = $db->where("parent_id = $id")->select();
		return $rows;

	}

	/*
	 * 添加教练时查询的数据
	 * 作者：张捷
	 */
	public function satffcoach(){

	}
	
	/**
	*	关联角色表，查出一个教练的信息
	*	author：yaobowen
	*/
	public function getvalue($name){
		return $this->where("staff.staff_name = '$name'")
					->join('role ON staff.role_id = role.role_id' )
					->join('coach_group ON staff.group_id = coach_group.group_id' )
					->find();
	}


}

?>