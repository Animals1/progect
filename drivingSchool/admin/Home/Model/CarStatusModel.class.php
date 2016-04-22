<?php
/*
 * @author:xueyunhuan
 * @date  :2016-4-13
 * @tablename:车辆类型表
 * */
namespace Home\Model;
use Think\Model;
class CarStatusModel extends Model {
	/*
	 *显示类型
	*/
		public function getallValue(){
			return $this->select();
		}
		/*
		 * 增加类型
		*/
		public function add_cartype($type_name){
			$data['type_name'] = $type_name;
			return $this->add($data);
		}
		/*
		 * 修改类型
		*/
		public function update_cartype($type_id,$type_name){
			$data['type_id'] = $type_id;
			return $this->where("type_id = $type_id")->save();
		}
		/*
		 * 删除类型
		*/
		public function delete_cartype($type_id){
			return $this->where("type_id = $type_id")->delete();
		}

		public function show()
		{
			return $this->select();
		}
}