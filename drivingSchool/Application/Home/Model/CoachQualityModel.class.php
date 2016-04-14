<?php
namespace Home\Model;
use Think\Model;
class CoachQualityModel extends Model {
	/*
	*	by  郭旭峰
	*	带教教练资质表
	*	添加信息
	*/
	public function coachqualityadd($qualityname){
		$data['quality_name'] = $qualityname;
		return $this->Table("coach_quality")->add($data);
	}


	/*
	*	查看
	*/
	public function coachqualitysele(){
		return $this->Table("coach_quality")->select();
	}

	/*
	*	根据id进行查看
	*/
	public function coachqualityidsele($id){
		return $this->Table("coach_quality")->where("quality_id=$id")->select();
	}

	/*
	*	根据id进行删除
	*/
	public function coachqualityiddele($id){
		return $this->Table("coach_quality")->where("quality_id=$id")->delete();
	}
}
?>