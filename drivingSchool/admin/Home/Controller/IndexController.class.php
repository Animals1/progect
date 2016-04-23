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

    public function index(){
        
        //判断是否登录
        if(!empty($_POST['sub'])){

            //接收用户登录信息
            $uname = $_POST['uname'];//最终用户名
            $upwd = $_POST['upwd'];
            $intermediateSalt = md5($upwd);
            $salt = substr($intermediateSalt, 0, 6);
            $nupwd = hash("sha256", $upwd . $salt);//最终密码
            //echo $nupwd;die;
            $userip = $_SERVER["REMOTE_ADDR"];//登录ip
            $logstarttime = date("Y-m-d H:i:s",time());//登录时间

            //临时会话（目的是登陆后刷新地址栏不会出现查不到数据导致刷新失败）
            cookie("username",$uname);
            cookie("userpwd",$nupwd);

            //验证用户信息
            $data = D("Admin");
            $arr = $data->adminmatching($uname,$nupwd);
            if($arr)
            {

                //验证是否选择了记住密码功能
            $check = $_POST['checkbox'];

            //如果选择了记住密码那么增加相应记住密码功能  
            if($check){
                
                //取出需要的信息从而方便接收用户id
                $userid = $arr[0]["admin_id"];
                $username= $arr[0]["admin_name"];
                $userpwd = $ar[0]['admin_pwd'];
                

                //存入cookie
                cookie('userid',$userid,3600*24);
                cookie('username',$username,3600*24);
                cookie('userpwd',$userpwd,3600*24);
                cookie('userip',$userip,3600*24);

                //判断角色取出角色id
                $role = D("admin");
                $isrole = $role->isrole();
                foreach($isrole as $k=>$v){
                    $newisrole[] = $v['role_id'];
                }

                if(in_array("7",$newisrole)){
                    //最高权限

                    $roleid = $isrole[0]["role_id"];
                    $rolename = $isrole[0]["role_name"];

                    $arr = $role->privilegesee($roleid);
                    $ar = base64_encode(gzcompress(serialize($arr)));
                    cookie('arr',$ar,time()+3600*24);
                    cookie('rolename',$rolename,time()+3600*24);
                    cookie('roleid',$roleid,time()+3600*24);
                    $this->display("main");
                }else{
                    
                    //普通用户权限判断
                    $rbac = implode(",",$newisrole);//将用户充当的角色转化成了字符串
                    //根据字符串进行统一的查询
                    $arr1 = $role->privilegelook($rbac);
                    $ar = base64_encode(gzcompress(serialize($arr1)));
                    cookie('arr',$ar,3600*24);
                    cookie('rolename',$rolename,3600*24);
                    cookie('roleid',$roleid,3600*24);
                    $this->display("main");

                }

            }else{

                //取出需要的信息从而方便接收用户id
                $userid = $arr[0]["admin_id"];
                $username= $arr[0]["admin_name"];

                //$logstarttime = date("Y-m-d H:i:s",time());
                

                //存入cookie
                cookie('userid',$userid);
                cookie('username',$username);

                
                //判断角色取出角色id
                $role = D("admin");
                $isrole = $role->isrole();


                //$dengluse = $role->logadd();


                foreach($isrole as $k=>$v){
                    $newisrole[] = $v['role_id'];
                }

                if(in_array("7",$newisrole)){
                    //最高权限

                    $roleid = $isrole[0]["role_id"];
                    $rolename = $isrole[0]["role_name"];

                    $arr = $role->privilegesee($roleid);
                    $ar = base64_encode(gzcompress(serialize($arr)));
                    cookie('arr',$ar);
                    cookie('rolename',$rolename);
                    cookie('roleid',$roleid);
                    $this->display("main");
                }else{
                    
                    //普通用户权限判断
                    $rbac = implode(",",$newisrole);//将用户充当的角色转化成了字符串
                    //根据字符串进行统一的查询
                    $arr1 = $role->privilegelook($rbac);
                    $ar = base64_encode(gzcompress(serialize($arr1)));
                    $logshow = $role->logsele();
                    //print_r($logshow);die;
                    cookie('arr',$ar);
                    cookie('rolename',$rolename);
                    cookie('roleid',$roleid);
                    $this->display("main");

                }
            }

            }else{
                echo "<script>alert(' You are a SB !');location.href='".__MODULE__."/Login/index'</script>";
            }

        }else{
            echo "<script>alert('Illegal logging!!!');location.href='".__MODULE__."/Login/index'</script>";
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


        /*
        *   显示上边界面
        */
        public function showtop(){
            
            $this->display("top");
        }


}