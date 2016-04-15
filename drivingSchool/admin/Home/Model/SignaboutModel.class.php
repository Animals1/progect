<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
	/*
	*	by 郭旭峰
	*	登录详情表的查询
	*/
	public function signabout(){
		return $this->Table("signabout")->select();
	}
}
?>