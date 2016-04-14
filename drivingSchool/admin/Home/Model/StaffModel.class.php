<?php
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
<<<<<<< HEAD
=======
<<<<<<< HEAD
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

	
=======
	protected $tableName='staff';
	protected $area='area';
>>>>>>> cbe9d38e55f6a9ea720c007304d5843221543cd5
	
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

>>>>>>> 1094fefbc7fbdcb5f1078fe174fb0fd15913fffc
}

?>