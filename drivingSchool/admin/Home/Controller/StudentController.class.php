<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index(){
    	$this->display('personinfo');
        }
        public function personinfo()
        {
        	$this->display('index');
        }
}