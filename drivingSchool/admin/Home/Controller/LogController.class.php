<?php
/**
	*@管理员模块----操作日志
*/
namespace Home\Controller;
use Think\Controller;
class LogController extends Controller {

    public function index(){
    	$this->display('login_log');
        }
    public function page(){
    	$this->display('page');
        }
      
      
      

}