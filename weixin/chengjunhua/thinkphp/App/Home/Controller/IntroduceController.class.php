<?php
/**
*@微信模块之~班型介绍
*@author:成军华
*/
namespace Home\Controller;
use Think\Controller;
class IntroduceController extends Controller {
	/**
	*版型介绍页面的展示
	*/
	public function introduce()
	{
		$this->display('introduce');
	}


}