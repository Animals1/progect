<?php
namespace Home\Model;
use Think\Model;
class WaitthingModel extends Model {
	/*
	*	代办事项模块
	*	by   郭旭峰
	*/
	public function waitthing(){
		$username = $_COOKIE["username"];
		return $this->Table("waitthing")->where("uname='$username'")->order("time desc")->select();
	}
}
?>