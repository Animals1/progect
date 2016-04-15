<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Created by PhpStorm.
 * User: yinaiying
 * Date: 2016/4/15
 * Time: 20:30
 * name: 班车路线
 */
class RouteController extends Controller 
{
	//渲染页面
	public function route()
	{
		$this->display('route');
	}

	//展示班车路线信息
	public function routeInfo()
	{
		$this->display('routeInfo');
	}
}

?>