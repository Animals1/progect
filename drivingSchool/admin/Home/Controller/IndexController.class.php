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
                        $this->display("main");
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");

                    }else if($rolename=="教练"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=2")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="行政"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=3")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="人事"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=4")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="财务"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=5")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="学员"){

                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=6")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else{
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=privilege_id")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }


                }else{
                    //cookie操作
                    //echo "123";
                    //cookie操作+密码项
                    //id、用户名都存入cookie
                    $userid = $arr[0]["admin_id"];
                    $username= $arr[0]["admin_name"];
                    $userpwd = $arr[0]["admin_pwd"];
                    $userip = $_SERVER["REMOTE_ADDR"];
                    //存入cookie
                    cookie('userid',$userid,time()+3600*24*7);
                    cookie('username',$username,time()+3600*24*7);
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
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");

                    }else if($rolename=="教练"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=2")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="行政"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=3")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="人事"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=4")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="财务"){
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=5")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else if($rolename=="学员"){
                        
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=6")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }else{
                        //目的是取出所有的控制器
                        $db=D("privilege");
                        $arr=$db->where("parent_id=privilege_id")->select();
                        //对控制器做一个循环，取出每一个控制器下的方法
                        foreach ($arr as $k => $v) {
                            $tmp=$db->where("parent_id=".$v['privilege_id'])->select();
                            $arr[$k]['methods']=$tmp;
                        }
                        //$arr[] = $rolename; 
                        //dump($arr);die;
                        $ar = base64_encode(gzcompress(serialize($arr)));
                         cookie('arr',$ar);
                         cookie('rolename',$rolename);
                         /*$this->assign("arr",$arr);
                         $this->assign("rolename",$rolename);*/
                        $this->display("main");
                    }
                }
            }else{
                $this->error("用户名或密码错误");
            }
        
        }else{
            $this->error("请先登录",U("Login/adminlogin"));
        }

        
    
    }





        public function personinfo(){
        	$this->display('index');
        }



        /*
        *   显示左边界面
        */
        public function showleft(){
            $arr = $_COOKIE["arr"];
            $ar = unserialize(gzuncompress(base64_decode($arr)));
            //print_r($ar);die;
            $this->assign("arr",$ar);
            $this->display("left");
        }



        
       

}