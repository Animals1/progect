<?php
/*
 * @author:xueyunhaun
 * @date  :2016-4-13
 * @tablename:车辆可预约类型表
 * */
namespace Home\Model;
use Think\Model;
class CarStatusModel extends Model {
	/*
	 *显示状态
	*/
		public function show(){
			return $this->select();
		}
		/*
		 * 增加状态
		*/
		public function add_carstatus($status_name){
			$data['status_name'] = $status_name;
			return $this->add($data);
		}
		/*
		 * 修改状态
		*/
		public function update_carstatus($status_name,$status_id){
			$data['status_id'] = $status_id;
			return $this->where("status_id = $status_id")->save();
		}
		/*
		 * 删除状态
		*/
		public function delete_carstatus($status_id){
			return $this->where("status_id = $status_id")->delete();
		}

}