<?php
namespace Home\Model;
use Think\Model;
class CoachModelModel extends Model {
	/*
	*	by 郭旭峰
	*	准教车型表
	*	添加信息
	*/
	public function coachmodeladd($modelname){
		$data['model_name'] = $modelname;
		return $this->Table("coach_model")->add($data);
	}


	/*
	*	查看
	*/
	public function coachmodelsele(){
		return $this->Table("coach_model")->select();
	}

	/*
	*	根据id进行查看
	*/
	public function coachmodelidsele($id){
		return $this->Table("coach_model")->where("model_id=$id")->select();
	}

	/*
	*	根据id进行删除
	*/
	public function coachmodeliddele($id){
		return $this->Table("coach_model")->where("model_id=$id")->delete();
	}
}
?>