<?php
/**
	*@管理员模块----用户管理
*/
namespace Home\Controller;
use Think\Controller;
class UserManagerController extends Controller {

    public function index(){
    	$this->display('user_manager');
        }
    public function role(){
    	$this->display('role_manager');
        }
      
    public function previlege(){
    	$this->display('previlege_manager');
        }
      
      

}