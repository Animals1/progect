<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /*
    *   用户登录判断
    *   by 郭旭峰
    */

    public function index(){
        //接收用户登录信息
        $uname = $_POST['uname'];

        $upwd = $_POST['upwd'];
        $intermediateSalt = md5($upwd);
        $salt = substr($intermediateSalt, 0, 6);
        $nupwd = hash("sha256", $upwd . $salt);

        $check = $_POST['checkbox'];

        //如果账号密码存在与数据库进行匹配
        if($uname and $nupwd){
            $data = D("Admin");
            $arr = $data->adminmatching($uname,$nupwd);
            if($arr){
                //判断是否选择了记住密码
                $check = $_POST['checkbox'];
                if($check){
                    //cookie操作+密码项
                    //id、用户名都存入cookie
                    $userid = $arr[0]["admin_id"];
                    $username= $arr[0]["admin_name"];
                    $userpwd = $arr[0]["admin_pwd"];
                    $userip = $_SERVER["REMOTE_ADDR"];
                    //存入cookie
                    cookie('userid',$userid,time()+3600*24*7);
                    cookie('username',$username,time()+3600*24*7);
                    cookie('userpwd',$userpwd,time()+3600*24*7);
                    cookie('userip',$userip,time()+3600*24*7);
                    
                    //判断角色
                    $role = D("admin");
                    $isrole = $role->isrole();
                    $rolename = $isrole[0]["role_name"];
                    if($rolename=="管理员"){

                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=1")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        //print_r($arr);die;
                        $this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);
                        $this->display("left");

                    }


                }else{
                    //cookie操作
                }
            }else{
                $this->error("用户名或密码错误");
            }
        }
        

    	//$this->display('main');
    }




        public function personinfo()
        {
        	$this->display('index');
        }


        public function aa()
        {
        	$model = D('Charge');
            $arr = $model->chargeshow();
            print_r($arr);
        }

}