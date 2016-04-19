<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /*
    *   用户登录判断
    *   by 郭旭峰
    */


    /*
    *   非法登录
    *   by  郭旭峰
    */

    public function denglu(){
        if(empty($_COOKIE['username'])){
            echo "<script>alert('请先登录');location.href='".__MODULE__."/Login/index'</script>";
        }
    }

    public function index(){
      
        //接收用户登录信息
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $intermediateSalt = md5($upwd);
        $salt = substr($intermediateSalt, 0, 6);
        $nupwd = hash("sha256", $upwd . $salt);
        

        //如果账号密码存在与数据库进行匹配
        if($uname and $nupwd){
            $data = D("Admin");
            $arr = $data->adminmatching($uname,$nupwd);
            if($arr){  // 角色id  
                //判断是否选择了记住密码
                $check = $_POST['checkbox'];

                if($check){
                    //cookie操作
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
                    $roleid = $isrole[0]["role_id"];
                    $rolename = $isrole[0]["role_name"];
                    //根据角色id查询权限
                    if($roleid!=7){
                        $arr = $role->privilegelook($roleid);
                        $ar = base64_encode(gzcompress(serialize($arr)));
                        cookie('arr',$ar,time()+3600*24*7);
                        cookie('rolename',$rolename,time()+3600*24*7);
                        $this->display("main");
                    }else{

                        $arr = $role->privilegesee($roleid);
                        $ar = base64_encode(gzcompress(serialize($arr)));
                        cookie('arr',$ar,time()+3600*24*7);
                        cookie('rolename',$rolename,time()+3600*24*7);
                        cookie('roleid',$roleid,time()+3600*24*7);
                        $this->display("main");
                    
                   }
                }else{
                    //cookie操作
                    //echo "123";
                    //cookie操作-密码项
                    //id、用户名都存入cookie
                    $userid = $arr[0]["admin_id"];
                    $username= $arr[0]["admin_name"];
                    $userip = $_SERVER["REMOTE_ADDR"];
                    //存入cookie
                    cookie('userid',$userid);
                    cookie('username',$username);
                    cookie('userip',$userip);
                    
                    //判断角色
                    $role = D("admin");
                    $isrole = $role->isrole();
                    $roleid = $isrole[0]["role_id"];
                    $rolename = $isrole[0]["role_name"];
                    //根据角色id查询权限
                    
                    if($roleid!=7){
                        $arr = $role->privilegelook($roleid);
                        $ar = base64_encode(gzcompress(serialize($arr)));
                        cookie('arr',$ar);
                        cookie('rolename',$rolename);
                        cookie('roleid',$roleid);
                       
                        $this->display("main");
                    }else{

                        $arr = $role->privilegesee($roleid);
                        $ar = base64_encode(gzcompress(serialize($arr)));
                        cookie('arr',$ar);
                        cookie('rolename',$rolename);
                        cookie('roleid',$roleid);

                        $this->display("main");
                    
                   }
                    }


                }

            }else{
                $this->error("用户名或密码错误");
            }


}
        
        
        public function personinfo(){
        	$this->display('index');
        }



        /*
        *   显示左边界面
        */
        public function showleft(){
            $roleid = $_COOKIE['roleid'];
                $arr = $_COOKIE["arr"];
                $ar = unserialize(gzuncompress(base64_decode($arr)));
                //dump($ar);die;
                $this->assign("arr",$ar);
                $this->display("left");
            
            
        }


}