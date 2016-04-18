<?php
/**
*@微信模块之~班型介绍
*@author:成军华
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	*版型介绍页面的展示
	*/
	public function index()
	{
		$this->display('index');

	}
	/**
	*网上约车
	*/
	public function internet_cart()
	{
		$this->display('internet_cart');
	}
	/***
	*查询预约学员的身份证号
	*/
	public function submit()
	{
	  	$idcard=I('post.idcard');
	  	$Password=I('post.Password');
	  	$model=D('Student');
	  	$bool=$model->selectIdcard($idcard);
	  	if(!empty($bool))
	  	{
	  		$intermediateSalt = md5($Password);
            $salt = substr($intermediateSalt, 0, 6);
            $nupwd = hash("sha256", $Password . $salt);
            $bool['new_pwd']=$nupwd;
	  		echo json_encode($bool);
	  	}
	  	else
	  	{
	  		echo '0';
	  	}
	}
	/***
	*加载验证码
	*/
	public function code()
	{
	$Verify =     new \Think\Verify();
	$Verify->fontSize = 30;
	$Verify->length   = 3;
	$Verify->useNoise = false;
	$Verify->entry();  	
	}
	/***
	*验证码验证
	*/
	function verity()
	{
		$yzm=I('post.yzm');
		$verify = new \Think\Verify();    
		$bool=$verify->check($yzm);
		if($bool)
		{
			echo '1';
		}
		else
		{
			echo '0';  
		}

	}



}