<?php
namespace Home\Model;
use Think\Model;
class StaffWrokModel extends Model {

	/*
	 * 员工考勤查询
	 * 作者：张捷
	 */
	protected $tableName='staff_work';
	function StaffWorkSelect(){

		$db=D($this->tableName);
		return $rows = $db->join('staff_work.staff_id = staff.staff_id')->select();

	}
	/*
	 * 员工考勤多条件查询
	 * 作者：张捷
	 */
	function StaffWrokFind($data){

		$where = array();
        if ($data['year'] != '') {
            $where['year'] = $data['year'];
        }
        
        if($data['staff_job'] != ''){
            $where['staff_job'] =  $data['staff_job'];
        }
         
        if($data['staff_sn'] != ''){
            $where['staff_sn'] =  $data['staff_sn'];
        }
        
        if($data['staff_name'] != ''){
            $where['staff_name'] =  $data['staff_name'];
        }
        return $re = $db->where($where)->select();

	}
}