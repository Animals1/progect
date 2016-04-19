<?php
/**
*微信开发---开始报名模块的开发
*@author：chengjunhua
*/
namespace Home\Controller;
use Think\Controller;
class OnlineController extends Controller {
	  /***
    展示个人报名页面
    */
    public function online()
    {
      $this->display('online');
    }
    public function adddata()
    {
    	$stu_name = I('post.uname');
    	$stu_tel  = I('post.phone');
    	$stu_sex  = I('post.sex');
    	$stu_age  = I('post.age');
    	$stu_currentplace = I('post.address');
    	$cert_level    = I('post.txt1');
    	$stu_info    = I('post.info');
        $Idcard    = I('post.Idcard');
        
    	//echo $stu_info;
    	$data=array(
    		'stu_name'=>$stu_name,
    		'stu_tel'=>$stu_tel,
    		'stu_sex'=>$stu_sex,
    		'stu_age'=>$stu_age,
    		'stu_currentplace'=>$stu_currentplace,
    		'cert_level'=>$cert_level,
    		'stu_info'=>$stu_info,
            'stu_idcard'=>$Idcard,
    		);
    	//print_r($data);
    	$model=D('Student');
    	$bool=$model->insertdata($data);
    	if ($bool) {
    		echo 1;
    	}
    	else
    	{
    		echo 0;
    	}

    }
}