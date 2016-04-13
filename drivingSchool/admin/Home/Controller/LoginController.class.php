<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$this->display('login');
        }
        public function stulogin(){
    	$this->display('login2');
        }
        public function adminlogin(){
    	$this->display('login1');
        }

}