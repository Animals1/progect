<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->display('main');
        }
<<<<<<< HEAD
        public function personinfo()
        {
        	$this->display('index');
        }
        public function aa()
        {
        	$arr = D('Progress');
            $arr = $arr->getshow();
            print_r($arr);die;
        }
=======
    
>>>>>>> ac520375d62f9eeb23ab62ec5baece47e621ea20
}