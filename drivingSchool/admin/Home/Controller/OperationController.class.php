<?php
namespace Home\Controller;
use Think\Controller;
class OperationController extends Controller {
	/*
	*	by 郭旭峰
	*	操作中心-登录操作
	*/
	public function signabout(){
		$data = D("signabout");
		$arr = $data->signabout();
		if($arr){
			$this->assign();
			$this->display();
		}else{
			$this->error("查询失败");
		}
		
	}
}
?>