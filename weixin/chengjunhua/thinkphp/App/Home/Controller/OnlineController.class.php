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
}