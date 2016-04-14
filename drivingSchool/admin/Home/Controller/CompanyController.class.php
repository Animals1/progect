<?php
/**
	*@管理员模块----公司管理
*/
namespace Home\Controller;
use Think\Controller;
class CompanyController extends Controller {

    public function index(){
    	$this->display('company');
        }
    public function role(){
    	$this->display('role_manager');
        }
      
    public function previlege(){
    	$this->display('previlege_manager');
        }
      
      

}