<?php
namespace Home\Model;
use Think\Model;
class ContinuityModel extends Model {
	/*
	*	by 郭旭峰
	*	记录登陆天数
	*/
	public function descsele(){
		$username = $_COOKIE['username'];
		return $this->Table("continuity")->order("id desc")->where("uname='$username'")->find();
	}


	/*
	*	登陆记录添加
	*/
	public function continuityadd(){
		$time = time();
		$uname = $_COOKIE["username"];
		//接收值
		$data["time"] = $time;
		$data["uname"] = $uname;
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
	*	BY 郭旭峰
	*/
	public function continuitydayssele(){
		$uname = $_COOKIE["username"];
		$arr = $this->Table("continuity")->where("uname='$uname'")->select();
		$count = count($arr);
		return $count;
	}


	/*
	*	月底入库上月打卡信息
	*	by  郭旭峰
	*/
	public function dakanumadd($dakanum,$nowmonth){
		$uname = $_COOKIE["username"];
		$data["uname"] = $uname;
		$data["month"] = $nowmonth;
		$data["num"] = $dakanum;
		return $this->Table("dakanum")->add($data);
	}
}
?>