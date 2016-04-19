<?php
	/**
	*	@管理员模块----教练
	*	author：yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
	/**
	*	查询当前教练的信息，返回一维数组
	*/
	public function personal_info(){
		$name = $_COOKIE['username'];
		$model = D('Staff');
		$arr = $model->getvalue($name);
		// print_r($arr);die;
		$this->assign('arr',$arr);
    	$this->display('personal_info');
		
	}
	/**
	*	查询关于该教练的评价
	*/
    public function award(){
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		$id = $_COOKIE['userid'];
		if($rolename=="最高管理"){
			$where = '';
		}
		else
		{
			$where = "coach_id = '$id'";
		}
		
		$model = D('Review');
		$arr = $model->getvalue($where);
		
		// print_r($arr);die;
		$where = "review.coach_id = '$id'";
		$one = $model->getonevalue($where);
		echo "<pre>";
		print_r($one);die;
		$show = $arr['0'];
		$list = $arr['1'];
		
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('award'); 

        }
    public function leave(){
    	$this->display('leave');
        }      
    public function attendance(){
    	$this->display('attendance');
        }
     /*
	* author:xueyunhuan
	* 我的学员
	*  学员详细信息
     */
    public function mystudent(){
    	$model = D('Student');
    	$arr = $model->allstudent();
    	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('count',$count);
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
    	$this->display('mystudent');
    }
     /*
	  *author:xueyunhuan
	  *条件查询
	  *多条件查询
     */
     public function query(){
     	$model = D('Student');
     	$arr = $model->query();
     	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('count',$count);
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
    	$this->display('mystudent');
     }
     public function studentinfo(){
     	$user_id = $_GET['user_id'];
     	$model = D('Student');
     	$arr = $model->studentinfo($user_id);
     	$this->assign('arr',$arr);
     	$this->display('studentinfo');
     }
}