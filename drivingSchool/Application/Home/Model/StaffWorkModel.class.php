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
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:员工考勤表
 * */
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where,$order,$limit)
    {
        return $this->where($where)->order("$order")->limit($limit)->find();
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }
}
