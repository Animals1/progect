<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	cookie('username',null);
        cookie('userid',null);
        cookie('userip',null);
        cookie('userpwd',null);
    	$this->display('login1');
        }
        public function stulogin(){
    	$this->display('login2');
        }
        public function adminlogin(){
    	$this->display('login1');
        }

}