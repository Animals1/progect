<?php
namespace Home\Model;
use Think\Model;
class ContinuityModel extends Model {
	/*
	*	by 郭旭峰
	*	记录登陆天数
	*/
	public function descsele(){
		return $this->Table("continuity")->order("id desc")->select();
	}


	/*
	*	登陆记录添加
	*/
	public function continuityadd(){
		$time = time();
		//接收值
		$data["time"] = $time;
		return $this->Table("continuity")->add($data);
	}


	/*
	*	清空表数据
	*/
	public function continuitydeleall(){
		return $this->Table("continuity")->delete('*');
	}


	/*
	*	查询表中的总记录数
	*/
	public function continuitydayssele(){
		$arr = $this->Table("continuity")->select();
		$count = count($arr);
		return $count;
	}
}
?>