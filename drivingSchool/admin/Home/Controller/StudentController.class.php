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
	 *$list = 显示数据
	 *$page = 翻页
	*/
       public function index(){
       	$model = D('StuOrder');
       	$arr = $model->getshow();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$this->assign('$page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->display('personinfo');
        }
    /*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据
	 *$page = 翻页
	*/
}