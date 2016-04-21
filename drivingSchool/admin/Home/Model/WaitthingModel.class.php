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
		//return $this->Table("waitthing")->where("uname='$username'")->order("time desc")->select();

			
			$user = M('waitthing');
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list =$user->page($p,6)->order('id desc')->select();
            $count      = $user->where("uname='$username'")->count();
        	$page       = new \Think\Page($count,6);
        	$show       = $page->show();
            $arr = array($list,$show,$count,$p);
            return $arr;

	}


	/*
	*	代办事项--删除
	*	by  郭旭峰
	*/
	public function thingdele(){
		$id = $_GET['id'];
		return $this->Table("waitthing")->where("id='$id'")->delete();
	}


	/*
	*	新建代办事项
	*	by  郭旭峰
	*/
	public function creatething(){
		//接收信息
		$time = $_POST['start'];
		$thing = $_POST['reason'];
		$uname = $_COOKIE['username'];
		//编辑入库操作
		$data['time'] = $time;
		$data['thing'] = $thing;
		$data['uname'] = $uname;
		$data['status'] = 0;
		return $this->Table("waitthing")->add($data);
	}


	/*
	*	代办事项确认项
	*	by  郭旭峰
	*/
	public function thingupdfield(){
		//接收id信息
		$id = $_GET['id'];
		$data['status'] = 1;
		return $this->Table("waitthing")->where("id = '$id'")->save($data);
	}

}
?>