<?php
/**
 *	员工表
 *	created by: yaobowen
 */
namespace Home\Model;
use Think\Model;
class StaffModel extends Model {
	protected $tableName='staff';
	protected $area='area';
	
	/*
	 * 员工地区联动查询
	 * 作者：张捷
	 */
	public function linkage($id){

		$db=D($this->area);
		$rows = $db->where("parent_id = $id")->select();
		return $rows;

	}

	/*
	 * 添加教练时查询的数据
	 * 作者：张捷
	 */
	public function satffcoach(){
		
	}

}

?>