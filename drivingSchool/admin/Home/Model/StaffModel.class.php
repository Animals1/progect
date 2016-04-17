<?php
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
	
		/*@author:郭旭峰
		@module:管理员-个人中心
		@个人信息*/
	
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

		$db=D('region');
		if (isset($id)) {
			$rows = $db->where("parent_id = $id")->select();
			return $rows;
		}else{
			$rows = $db->where("parent_id = 1")->select();
			return $rows;
		}

	}
	/*
	 * 角色查询
	 * 作者：张捷
	 */
	public function roleselect(){
		$db = D('role');
		return $db->select();
	}

	
		
	
	/*
	 * 添加教练时查询的数据
	 * 作者：张捷
	 */
	public function satffcoach(){
	
		$data = array();
		$drivingcard = D('coach_driving');
		$grade = D('coach_grade');
		$quality = D('coach_quality');
		$coach = D('coach_model');
		$coachmotor = D('coach_motor');
		$data[] = $drivingcard->select();
		$data[] = $grade->select();
		$data[] = $quality->select();
		$data[] = $coach->select();
		$data[] = $coachmotor->select();
		return $data;
	
	}
	/*
	 * 员工添加
	 * 作者：张捷	
	 */
	public function staffadd($img,$rows){
		$db=D("staff");
		$coach = D('coach');
		$data['staff_photo']=$img;
		$data['staff_name'] = $rows['name'];
		$data['staff_sn'] = $rows['sn'];
		$data['staff_sex'] = $rows['sex'];
		$data['staff_year'] = $rows['year'];
		$data['staff_nation'] = $rows['nation'];
		$data['staff_idcard'] = $rows['idcard'];
		$data['staff_marriage'] = $rows['marriage'];
		$data['staff_birthplace'] = $rows['birthplace'];
		$data['staff_account'] = $rows['account'];
		$data['staff_curaddress'] = $rows['curaddress'];
		$data['staff_tel'] = $rows['tel'];
		$data['staff_start_year'] = $rows['startyear'];
		$data['staff_end_year'] = $rows['endyear'];
		$data['role_id'] = $rows['role'];
		$data['staff_job'] = $rows['job'];
		$data['staff_basic'] = $rows['basic'];
		if ($data['role_id'] == '1') {
			$re = $db->create($data);
			$row = $db->where("staff_sn = '".$rows['sn']."'");
			$staff_id = $row['staff_id'];
			$codata['coach_staff_id'] = $staff_id;
			$codata['coach_start_year'] = $rows['coachyear'];
			$codata['coach_validity'] = $rows['coachvalidity'];
			$codata['driving_start_year'] = $rows['drivingyear'];
			$codata['driving_validity'] = $rows['drivingvalidity'];
			$codata['driving_id'] = $rows['drivingid'];
			$codata['coach_sn'] = $rows['coachsn'];
			$codata['grade_id'] = $rows['gradeid'];
			$codata['quality_id'] = $rows['qualityid'];
			$codata['model_id'] = $rows['modelid'];
			$codata['motor_id'] = $rows['motorid'];
			$core = $coach->create($codata);
			if ($re && $core){
				return true;
			}else{
				return false;
			}
		}else{
			return $re = $db->create($data);
		}
	}
	/*
	 * 对地区进行处理
	 * 作者：张捷
	 */
	public function area($area){
		$region = D('region');
		$birthplace = $area['birthplace'];
		$birthplace .= ','.$area['birthplace1'];
		$birthplace .= ','.$area['birthplace2'];
		$account = $area['account'];
		$account .= ','.$area['account1'];
		$account .= ','.$area['account2'];
		$curaddress = $area['curaddress'];
		$curaddress .= ','.$area['curaddress1'];
		$curaddress .= ','.$area['curaddress2'];
		$curaddress_name = $region->where("region_id in ($curaddress)")->select();
		$curaddress_names = $curaddress_name[0]['region_name'].$curaddress_name[1]['region_name'].$curaddress_name[2]['region_name'].$area['curaddress3'];
		unset($area['birthplace']);
		unset($area['birthplace1']);
		unset($area['birthplace2']);
		unset($area['account']);
		unset($area['account1']);
		unset($area['account2']);
		unset($area['curaddress']);
		unset($area['curaddress1']);
		unset($area['curaddress2']);
		unset($area['curaddress3']);
		$area['birthplace'] = $birthplace;
		$area['account'] = $account;
		$area['curaddress'] = $curaddress_names;
		return $area;
	}
	/*
	 * 对接过来的id进行处理
	 * 作者：张捷
	 */
	public function iddeal($iddeal){
		foreach ($iddeal['qualityid'] as $quk => $quv) {
			$quid .= ','.$quv;
		}
		foreach ($iddeal['modelid'] as $modelk => $modelv) {
			$modelid .= ','.$modelv;
		}
		foreach ($iddeal['motorid'] as $motork => $motorv) {
			$motorid .= ','.$motorv;
		}
		$quid = trim($quid,',');
		$modelid = trim($modelid,',');
		$motorid = trim($motorid,',');
		$iddeal['qualityid'] = $quid;
		$iddeal['modelid'] = $modelid;
		$iddeal['motorid'] = $motorid;
		return $iddeal;
	}
	/*
	 * 对时间进行处理
	 * 作者：张捷
	 */
	public function dealtime($time){
		if ($time['role'] == '1') {
			$year = strtotime($time['year']);
			$coachyear = strtotime($time['coachyear']);
			$coachvalidity = strtotime($time['coachvalidity']);
			$drivingyear = strtotime($time['drivingyear']);
			$drivingvalidity = strtotime($time['drivingvalidity']);
			$time['year'] = $year;
			$time['coachyear'] = $coachyear;
			$time['coachvalidity'] = $coachvalidity;
			$time['drivingyear'] = $drivingyear;
			$time['drivingvalidity'] = $drivingvalidity;
		}else{
			$year = strtotime($time['year']);
			$time['year'] = $year;
		}
		return $time;
		
	}
	/*
	 * 教练员工查询
	 * 作者：张捷
	 */
	public function staffcoachselect(){
		$db=D("staff");
		return $db->join('staff.staff_id = coach.coach_staff_id')->select();
	}
	
	/*
	 * 员工多条件查询
	 * 作者：张捷
	 */
	public function staffsearch($data){
	
		$db = D('staff');
		$datas = '';
		if ($data['staff_sn'] != '') {
			$datas .= 'staff_sn = '.$data['staff_sn'];
		}else if ($data['staff_name' != '']){
			$datas .= ' and staff_name = '.$data['staff_name'];
		}else if ($data['staff_idcard' != '']) {
			$datas .= 'and staff_idcard = '.$data['staff_idcard'];
		}else if ($data['staff_tel'] != '') {
			$datas .= ' and staff_tel = '.$data['staff_tel'];
		}
		$re = $db->join('staff.staff_id = coach.coach_staff_id')->where($datas)->select();
		if ($re) {
			return $re;
		}else{
			return $db->where($datas)->select();
		}
	
	}
	/*
	 * 员工状态修改
	 * 作者：张捷
	 */
	public function jobstatus($id){
	
		$db = D('staff');
		$data = array();
		$data['staff_job'] = 2;
		return $db->where("staff_id = $id")->save($data);
	
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
	/**
	*	关联角色表，查出一个教练的预约状态和姓名
	*	author：xueyunhuan
	*/
	public function getshow(){
		return $this->join("role on role.role_id = staff.role_id")->join("coach on coach.role_id = role.role_id")->field('staff_name,coach_status')->select();
	}


	/*
	*	个人中心-个人信息
	*	by 郭旭峰
	*/
	public function everyoneabout(){
		//接收cookie
		$username = $_COOKIE["username"];
		return $this->Table("staff")->join('role ON staff.role_id = role.role_id')->where("staff_name='$username'")->find();
	}
}

?>