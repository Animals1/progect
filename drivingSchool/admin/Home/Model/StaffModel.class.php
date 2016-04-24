<?php
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
	
		/*@author:�����
		@module:����Ա-��������
		@������Ϣ*/
	
	public function staffsele($staffid){
		return $this->Table("staff")->join('role ON staff.role_id = role.role_id')->where("staff_id=$staffid")->select();
	}
	
	/*
	*	@������Ϣ�ַ��޸�
	*/
	public function stafffieldsave($field){
		if($field=="staff_curaddress"){
			$province = $_POST['province'];//ʡ
			$city = $_POST['city'];//��
			$county = $_POST['county'];//��
			$other = $_POST['other'];//��ע
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
	 * Ա������������ѯ
	 * ���ߣ��Ž�
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
	 * ��ɫ��ѯ
	 * ���ߣ��Ž�
	 */
	public function roleselect(){
		$db = D('role');
		return $db->select();
	}

	
		
	
	/*
	 * ��ӽ���ʱ��ѯ������
	 * ���ߣ��Ž�
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
	 * Ա�����
	 * ���ߣ��Ž�	
	 */
	public function staffadd($rows){
		$db=D("staff");
		$coach = D('coach');
		$data['staff_photo']= $rows['img'];
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
		$data['staff_email'] = $rows['email'];
		$data['staff_start_year'] = $rows['startyear'];
		$data['staff_end_year'] = $rows['endyear'];
		$data['role_id'] = $rows['role'];
		$data['staff_job'] = '1';
		$data['staff_basic'] = '2000';
		if ($rows['role'] == '1') {
			$re = $db->add($data);
			$sn = $rows['sn'];
			$row = $db->where("staff_sn = $sn")->select();
			$staff_id = $row[0]['staff_id'];
			$codata['coach_staff_id'] = $staff_id;
			$codata['role_id'] = $rows['role'];
			$codata['coach_start_year'] = $rows['coachyear'];
			$codata['coach_validity'] = $rows['coachvalidity'];
			$codata['driving_start_year'] = $rows['drivingyear'];
			$codata['driving_validity'] = $rows['drivingvalidity'];
			$codata['driving_id'] = $rows['drivingid'];
			$codata['coach_sn'] = $rows['coachsn'];
			$codata['grade_id'] = $rows['gradeid'];
			$codata['quality'] = $rows['qualityid'];
			$codata['model'] = $rows['modelid']; 
			$codata['motor'] = $rows['motorid'];
			$codata['group_id']=0;
			$core = $coach->add($codata);
			if ($re && $core){
				return true;
			}else{
				return false;
			}
		}else{
			return $re = $db->add($data);
		}
	}
	/*
	 * �Դ�������ͼƬ���д���
	 * ���ߣ��Ž�
	 */
	public function img($data)
	{
		$img = D('Upload');
		$srcimg = $img->upload('img');
		return $srcimg;
	}
	/*
	 * �Ե������д���
	 * ���ߣ��Ž�
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
	 * �Խӹ�����id���д���
	 * ���ߣ��Ž�
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
	 * ��ʱ����д���
	 * ���ߣ��Ž�
	 */
	public function dealtime($time){
		if ($time['role'] == '1') {
			$year = strtotime($time['year']);
			$startyear = strtotime($time['startyear']);
			$endyear = strtotime($time['endyear']);
			$coachyear = strtotime($time['coachyear']);
			$coachvalidity = strtotime($time['coachvalidity']);
			$drivingyear = strtotime($time['drivingyear']);
			$drivingvalidity = strtotime($time['drivingvalidity']);
			$time['year'] = $year;
			$time['startyear'] = $startyear;
			$time['endyear'] = $endyear;
			$time['coachyear'] = $coachyear;
			$time['coachvalidity'] = $coachvalidity;
			$time['drivingyear'] = $drivingyear;
			$time['drivingvalidity'] = $drivingvalidity;
		}else{
			$year = strtotime($time['year']);
			$startyear = strtotime($time['startyear']);
			$endyear = strtotime($time['endyear']);
			$time['startyear'] = $startyear;
			$time['endyear'] = $endyear;
			$time['year'] = $year;
		}
		return $time;
		
	}
	/*
	 * �Խ�����ɫʱ����и�ʽ��������
	 * ���ߣ��Ž�
	 */
	public function coachdatetime($time){

		foreach ($time as $k => $v) {
				$year = date("Y-m-d",$time['staff_year']);
				$startyear = date("Y-m-d",$time['staff_start_year']);
				$endyear = date("Y-m-d",$time['staff_end_year']);
				$coachyear = date("Y-m-d",$time['coach_start_year']);
				$coachvalidity = date("Y-m-d",$time['coach_validity']);
				$drivingyear = date("Y-m-d",$time['driving_start_year']);
				$drivingvalidity = date("Y-m-d",$time['driving_validity']);
				$time[$k]['staff_year'] = $year;
				$time[$k]['staff_start_year'] = $startyear;
				$time[$k]['staff_end_year'] = $endyear;
				$time[$k]['coach_start_year'] = $coachyear;
				$time[$k]['coach_validity'] = $coachvalidity;
				$time[$k]['driving_start_year'] = $drivingyear;
				$time[$k]['driving_validity'] = $drivingvalidity;
		}
		return $time;
	}
	/*
	 * ��������ɫʱ����и�ʽ��������
	 * ���ߣ��Ž�
	 */
	public function staffdatetime($time){

		foreach ($time as $k => $v) {
				$year = date("Y-m-d",$time['staff_year']);
				$startyear = date("Y-m-d",$time['staff_start_year']);
				$endyear = date("Y-m-d",$time['staff_end_year']);
				$time[$k]['staff_year'] = $year;
				$time[$k]['staff_start_year'] = $startyear;
				$time[$k]['staff_end_year'] = $endyear;
				$time[$k]['coach_start_year'] = $coachyear;
		}
		return $time;
	} 
	/*
	 * ����Ա����ѯ
	 * ���ߣ��Ž�
	 */
	public function staffcoachselect(){
		$db=D("staff");
		return $db->join('coach ON staff.staff_id = coach.coach_staff_id')->where("staff.role_id = 1")->select();
	}
	/*
	 * ����Ա�����в�ѯ
	 * ���ߣ��Ž�
	 */
	public function staffselect(){
		$db=D("staff");
		return $db->join("role ON staff.role_id = role.role_id")->where("staff.role_id in (4,5,6)")->select();
	}
	
	/*
	 * Ա����������ѯ
	 * ���ߣ��Ž�
	 */
	public function staffsearch($data){
		//print_r($data);die;
		$db = D('staff');
		
		if ($data['id'] == '1') {
			$where = "staff.role_id = 1 "; 
			$where1 = 'staff.role_id in (4,5,6) ';
		}else{
			$where = 'staff.role_id in (4,5,6) ';
			$where1 = "staff.role_id = 1 "; 
		}
		
		if($data['sn']!=null)
		{
			$where.="AND  staff.staff_sn like '%$data[sn]%'";
		}
		if($data['name']!=null)
		{
            $where.="AND  staff.staff_name like '%$data[name]%'";
		}
		if($data['idcard']!=null)
		{
            $where.="AND  staff.staff_idcard like '%$data[idcard]%'";
		}
		if($data['tel']!=null)
		{
            $where.="AND  staff.staff_tel like '%$data[tel]%'";
		}
		if ($data['id'] == '1') {
			$rows[0] = $db->join('coach ON staff.staff_id = coach.coach_staff_id')->where($where)->select();
			$rows[1] = $db->join("role ON staff.role_id = role.role_id")->where($where1)->select();
			return $rows;
		}else{
			$rows[0] = $db->join('coach ON staff.staff_id = coach.coach_staff_id')->where($where1)->select();
			$rows[1] = $db->join("role ON staff.role_id = role.role_id")->where($where)->select();
			return $rows;
		}
	
	}
	/*
	 * Ա��״̬�޸�
	 * ���ߣ��Ž�
	 */
	public function jobstatus($id){
	
		$db = D('staff');
		$data = array();
		$data['staff_job'] = 2;
		return $db->where("staff_id = $id")->save($data);
	
	}
	
	/**
	*	������ɫ�����һ����������Ϣ
	*	author��yaobowen
	*/
	public function getvalue($name){
		return $this->where("staff.staff_name = '$name'")
					->join('role ON staff.role_id = role.role_id' )
					->join('coach ON staff.staff_id = coach.coach_staff_id' )
					->join('coach_group ON coach.group_id = coach_group.group_id' )
					->find();
	}
	/**
	*	������ɫ�����һ��������ԤԼ״̬������
	*	author��xueyunhuan
	*/
	public function getshow(){
		return $this->join("role on role.role_id = staff.role_id")->join("coach on coach.role_id = role.role_id")->field('staff_name,coach_status')->select();
	}


	/*
	*	��������-������Ϣ
	*	by �����
	*/
	public function everyoneabout(){
		//����cookie
		$username = $_COOKIE["username"];
		return $this->Table("staff")->join('role ON staff.role_id = role.role_id')->where("staff_name='$username'")->find();
	}


	/*
	*	������Ϣ--�ֶ��޸�
	*	by �����
	*/
	public function updatefield($field){
		$username = $_COOKIE["username"];
		if($field==1){
			//�����ֶ�
			$newstaff_curaddress = $_POST["staff_curaddress"];
			$data["staff_curaddress"] = $newstaff_curaddress;
			return $this->Table("staff")->where("staff_name = '$username'")->save($data);
		}else if($field==2){
			//�����ֶ�
			$newstaff_tel = $_POST["staff_tel"];
			$data["staff_tel"] = $newstaff_tel;
			return $this->Table("staff")->where("staff_name = '$username'")->save($data);
		}else{
			//�����ֶ�
			$newstaff_email = $_POST["staff_email"];
			$data["staff_email"] = $newstaff_email;
			return $this->Table("staff")->where("staff_name = '$username'")->save($data);
		}
	}



	/*
	*	������Ϣ--�ֶ��޸Ľ�����ʾ
	*/
	public function showupdatefield(){
		$username = $_COOKIE["username"];
		return $this->Table("staff")->where("staff_name='$username'")->select();
	}
	/*
	 * �ļ��ϴ�������
	 * ���ߣ��Ž�
	 */
	public function upload($name){

		$upload = new \Think\Upload();   
	    $upload->maxSize   =     3145728 ;
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
	    $upload->rootPath  =      './';
	    $upload->savePath  =      './Public/Uploads/';  
	    $info   =   $upload->upload(); 
	    $img = $info[$name]['savepath'].$info[$name]['savename'];
	    $img = substr($img,8);
	    return $img;
	}

	/**
	*	ͨ���û�������ѯ����id
	*/

<<<<<<< HEAD
	public function selcoachid($name)
	{
		return $this->where("staff_name = '$name'")->join("coach ON staff.staff_id = coach.coach_staff_id")->find();
	}

	/*public function selcoachid($name){
		return $this->where("staff_name = '$name'")
					->join("coach ON staff.staff_id = coach.coach_staff_id")
					->find();
	}*/
=======


	public function selcoachid($name){
		return $this->where("staff_name = '$name'")
					->join("coach ON staff.staff_id = coach.coach_staff_id")
					->find();

	}
>>>>>>> 3c99009d0e83793ff2b7c4c59be6db6eb7b944c3
	/**
	 * ��ѯȫ����Ա����Ϣ�������ֶΣ�
	 */
	public function allvalue()
	{
		return $this->field('staff_id,staff_name,staff_sn')->select();
	}

	/**
	 * ��ѯ��Ϣ
	 */
	public function allpen(){
		return $this->select();
<<<<<<< HEAD

=======
>>>>>>> 3c99009d0e83793ff2b7c4c59be6db6eb7b944c3
	}
	/*
	 * ��ѯ����
	 * ���ߣ��Ž�
	 */
	public function month()
	{
		$db = D('month');
		return $db->select();
	}
	/*
	 * ��ѯǩ������
	 * ���ߣ��Ž�
	 */
	public function salary()
	{
		$db = D('staff');
		$daka = D('dakanum');
		$month = D('month');
		$mo = $month->select();
		$row = $db->where("staff.role_id in (1,4,5,6)")->select();
		foreach ($row as $k => $v) {
			$id = $v['staff_id'];
			for($i=1;$i<=12;$i++){
				// $mid = $mv['month'];
				$mon= $daka->where("staff_id = '$id' and month = '$i'")->select();
				//$mont[]=$mon['']
				$mo[$i]=$mon;
				unset($mo[0]);
				
			}
			//print_r($mo);
			$row[$k]['month']=$mo;
			
		}
		
		return $row;
	}
	/*
     * ��������
     * ���ߣ��Ž�
	 */
	public function searsalary($data)
	{
		$db = D('staff');
		$daka = D('dakanum');
		$month = D('month');
		$where = "role_id in (1,4,5,6) ";
		if($data['sn'] != ''){
			$where .= "AND  staff_sn like '%$data[sn]%'";
		}
		if ($data['name'] != '') {
			$where .= "AND  staff_name like '%$data[name]%'";
		}
		$mo = $month->select();
		$row = $db->where($where)->select();
		foreach ($row as $k => $v) {
			$id = $v['staff_id'];
			for($i=1;$i<=12;$i++){
				// $mid = $mv['month'];
				$mon= $daka->where("staff_id = '$id' and month = '$i'")->select();
				//$mont[]=$mon['']
				$mo[$i]=$mon;
				unset($mo[0]);
				
			}
			//print_r($mo);
			$row[$k]['month']=$mo;
			
		}
		
		return $row;
<<<<<<< HEAD

=======
	}
	/*
	 * ��ѯ���ҳ������
	 * ���ߣ��Ž�
	 */
	public function leave()
	{
		$db = D('staff');
		$row = $db->join('staff_leave on staff.staff_id = staff_leave.work_id')->where("staff.role_id in (1,4,5,6)")->select();
		return $row;
	}
	/*
	 * ���ҳ������
	 * ���ߣ��Ž�
	 */
	public function leasearch($data)
	{
		$db = D('staff');
		$where = 'staff.role_id in (1,4,5,6) ';
		if ($data['sn'] != '') {
			$where .= "and staff.staff_sn like '%$data[sn]%'";
		}
		if($data['name'] != ''){
			$where .= "and staff.staff_name like '%$data[name]%'";
		}
		if($data['starttime'] != ''){
			$starttime = substr($data['starttime'],0,10);
			$where .= "and staff_leave.leave_starttime like '%$starttime%'";
		}
		if($data['endtime'] != ''){
			$endtime = substr($data['endtime'],0,10);
			$where .= "and staff_leave.leave_endtime like '%$endtime%'";
		}
		$row = $db->join('staff_leave on staff.staff_id = staff_leave.work_id')->where($where)->select();
		return $row;
	}
	/*
	 * ����ѧʱ��ѯ
	 * ���ߣ��Ž�
	 */
	public function hours()
	{
		$db = D('staff');
		$daka = D('dakanum');
		$month = D('month');
		$mo = $month->select();
		$row = $db->where("role_id = 1")->select();
		foreach ($row as $k => $v) {
			$id = $v['staff_id'];
			for($i=1;$i<=12;$i++){
				$mon = $daka->where("staff_id = '$id' and month = '$i'")->select();
				$num = $mon[0]['num'];
				$nums = ($num * 8);
				if ($nums == '0') {
					$nums = '';
				}
				$mon[0]['hour'] = $nums;
				$mo[$i]=$mon;
				unset($mo[0]);
				
			}
			$row[$k]['month']=$mo;
			
		}
		return $row;
	}
	/*
	 * ����ѧʱ����
	 * ���ߣ��Ž�
	 */
	public function searhours($data)
	{
		// print_r($data);exit;
		$db = D('staff');
		$daka = D('dakanum');
		$month = D('month');
		$where = "role_id = 1 ";
		if ($data['job'] != '') {
			$where .= "and staff_job = '$data[job]'";
		}
		if ($data['sn'] != '') {
			$where .= "and staff_sn like '%$data[sn]%'";
		}
		if($data['name'] != ''){
			$where .= "and staff_name like '%$data[name]%'";
		}
		$mo = $month->select();
		$row = $db->where($where)->select();
		foreach ($row as $k => $v) {
			$id = $v['staff_id'];
			for($i=1;$i<=12;$i++){
				$mon = $daka->where("staff_id = '$id' and month = '$i'")->select();
				$num = $mon[0]['num'];
				$nums = ($num * 8);
				if ($nums == '0') {
					$nums = '';
				}
				$mon[0]['hour'] = $nums;
				$mo[$i]=$mon;
				unset($mo[0]);
				
			}
			$row[$k]['month']=$mo;
			
		}
		return $row;
	}
	/*
     * Ա��������״̬
     * ���ߣ��Ž�
	 */
	public function leavestatus($sid,$id)
	{
		$db = D('staff_leave');
		if ($sid == '2') {
			return $db->where("leave_id = $id")->setField('leave_status','2');
		}else{
			$data['leave_status'] = '3';
			return $db->where("leave_id = $id")->setField('leave_status','3');
		}
	}	
	/*
     * �������ò�ѯ
     * ���ߣ��Ž�
	 */
	public function wage()
	{
		$db = D('in_out');
		$fa = $db->where('parent_id = 1')->select();
		$fa['count'] = $db->where('parent_id = 1')->count();
		$fa1 = $db->where('parent_id = 2')->select();
		$fa1['count'] = $db->where('parent_id = 2')->count();
		$arr[] = $fa;
		$arr[] = $fa1;
		return $arr;
	}
	/*
     * �����������
     * ���ߣ��Ž�
	 */
	public function wageadd($data)
	{
		$db = D('in_out');
		$list = array();
		foreach ($data['name'] as $k => $v) {
			$list[] = array("name" => $v , 'parent_id' => $data['pid']);
		}
		return $db->addAll($list);
	}
	/*
     * ��������ɾ��
     * ���ߣ��Ž�
	 */
	public function wagedel($id)
	{
		$db = D('in_out');
		return $db->where("in_out_id = $id")->delete();
>>>>>>> 3c99009d0e83793ff2b7c4c59be6db6eb7b944c3
	}
}
?>