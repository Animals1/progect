<?php
/**
	*@学员模块----个人中心(xueyunhuan)
	*/
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
	/*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(当前用户信息)
	 *$page = 翻页
	*/
       public function index(){
       	$model = D('Student');
       	$arr = $model->getshow();
       	$this->assign('arr',$arr);
       	//print_r($arr);die;
       	$this->display('personinfo');
        }
      /*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(当前用户预约列表)
	 *$page = 翻页
	*/
       public function stuorder(){
       	$model = D('StuOrder');
       	$arr = $model->getshow();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$this->assign('$page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->display('stuorder');
        }
 		/*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(我的学费---学费明细)
	 *$page = 翻页
	*/
       public function mycharge(){
       	$model = D('Charge');
       	$arr = $model->chargeshow();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	//print_r($page);die;
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->assign('count',$count);
       	$this->display('mycharge');
        }

       /*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(当前用户已取消预约列表)
	 *$page = 翻页
	*/
       public function noorder(){
       	$model = D('StuOrder');
       	$arr = $model->noorder();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->assign('count',$count);
       	//print_r($list);die;
       	$this->display('noorder');
        }
}