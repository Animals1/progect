<?php
/**
	*@学员模块----个人中心
	*/
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
       public function index(){
    	$this->display('personinfo');
        }
}