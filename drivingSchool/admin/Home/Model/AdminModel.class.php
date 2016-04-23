<?php
/*
 *@author:郭旭峰
 *@date  :2016-4-13
 *@typename:用户权限中心
 * */
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
    
    /*
    *   分配权限
    */
    /*public function fenprivilege()
        {
            //用户session
            $id=session('admin_id');
            //用户id为1 代表最高管理员
            if($id==1)
            {
                $Privilege = M("privilege"); // 实例化privilege对象
                $list = $Privilege->where('parent_id=0')->order('create_time')->select();
                //得到parent_id=0的权限遍历出来  无限极分类
                return $this->digui($list,$pid=0);
            }else
            {
                //不是最高管理员 
                $list=$this->table('admin as a')->join('admin_role as ar on a.admin_id=ar.admin_id')
                     ->join('role_privilege as rp on ar.role_id=rp.role_id')->select();
                $data=array();
                foreach($list as $k=>$v)
                {
                    $data=$list->digui($list,$pid=$v['privilege_id']);
                }
                return $data;
                
            }
            
        }*/



        /*无限极分类  递归调用*/
        public function digui($list,$pid)
        {
            $child=array();
            foreach ($list as $key => $value) 
            {
                if($value['parent_id']==$pid)
                {
                    $child[]=$value;
                }
            }
            //child 为空
            if(empty($child))
            {
                return null;
            }

            foreach ($child as $k => $v) 
            {
                $three_child=$this->digui($list,$v['parent_id']);
                if($three_child)
                {
                    $child[$k]['child']=$three_child;
                }
            }

            return $child;
        }



        /*
        *   @BY 郭旭峰
        *   @用户管理-账号管理
        *   查询用户-角色表
        */
        public function numbermanager(){
            return $this->Table("admin")->join('admin_role ON admin.admin_id = admin_role.admin_id')->join('role ON admin_role.role_id = role.role_id')->select();
        }

        public function usermanagerlist(){
            /*return 
            $this
            ->Table("admin")
            ->join('admin_role ON admin.admin_id = admin_role.admin_id')
            ->join('role ON admin_role.role_id = role.role_id')
            ->join('admin_staff ON admin.admin_id = admin_staff.admin_id')
            ->join('staff ON admin_staff.staff_id = staff.staff_id')
            ->select();*/



            $user = M('admin');
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list =$user->page($p,6)->join('admin_role ON admin.admin_id = admin_role.admin_id')
            ->join('role ON admin_role.role_id = role.role_id')
            ->join('admin_staff ON admin.admin_id = admin_staff.admin_id')
            ->join('staff ON admin_staff.staff_id = staff.staff_id')->select();
            $count      = $user->join('admin_role ON admin.admin_id = admin_role.admin_id')
            ->join('role ON admin_role.role_id = role.role_id')
            ->join('admin_staff ON admin.admin_id = admin_staff.admin_id')
            ->join('staff ON admin_staff.staff_id = staff.staff_id')->count();
            $page       = new \Think\Page($count,6);
            $show       = $page->show();
            $arr = array($list,$show,$count,$p);
            return $arr;


        }



        /*
        *   账号管理删除操作
        *   by  郭旭峰
        */
        public function usermanagerlistiddele(){
            //接收id信息
            $id = $_GET['id'];
            return $this->Table("admin_staff")->where("id='$id'")->delete();
        }


        /*
        *   查询用户账号密码是否在存在
        */
        public function adminmatching($uname,$nupwd){
            $data["admin_name"] = $uname;
            $data["admin_pwd"] = $nupwd;
            return $this->Table("admin")->where($data)->select();
        }


        /*
        *   判断角色
        */
        public function isrole(){
            //读取cookie
            $cooid = $_COOKIE["userid"];
            return 
            $this->Table("admin")
            ->join('admin_role ON admin.admin_id = admin_role.admin_id')
            ->join('role ON admin_role.role_id = role.role_id')
            ->where("admin_role.admin_id=$cooid")
            ->select();
        }



        /*
        *   rbac广泛查询
        */
        public function rbacinsele($rbac){


        }



        /*
        *   根据角色id查询权限
        *   by 郭旭峰
        */
        public function privilegelook($rbac){   
            //var_dump($roleid);die;       
            $da=$this->Table("role")->join('role_privilege ON role.role_id = role_privilege.role_id')->join('privilege ON role_privilege.privilege_id = privilege.privilege_id')->where("role.role_id in($rbac)")->select();
            //dump($da);die;
           return $this->digui2($da,$pid=0);
            
        }







        public function privilegesee($roleid){          
            $da=$this->Table("role")->join('role_privilege ON role.role_id = role_privilege.role_id')->join('privilege ON role_privilege.privilege_id = privilege.privilege_id')->where("role.role_id='$roleid'")->select();
            //dump($da);die; 
            foreach($da as $k=>$v){
                $a = $this->digui3($v,$pid=0);
                
            }
            return $a;

        }





        /****
            递归调用
        */
        public function digui2($da,$pid=0)
        {
            $child=array();
            foreach($da as $k=>$v)
            {
                if($pid==$v['parent_id'])
                {
                    $privilege=M('privilege');
                    $two=$privilege->where('parent_id ='.$v['privilege_id'])->select();
                    $child[]=$two;
                }
                
            }
            //dump($child);die;
            if(empty($child))
            {
                return null;
            }
            //print_r($child);die;
            /*第三级*/
            foreach($child as $key=>$val)
            {
                foreach($val as $kk=>$vv){
                    $privilege=M('privilege');
                    $three=$privilege->where('parent_id='.$vv['privilege_id'])->select();
                    if($three)
                    {
                        $child[$key][$kk]['child']=$three;
                    }
                    
                }

            }
            //dump($child);die;
            foreach($da as $dk=>$dv)
            {
               
                  $da[$dk]['childs'] = $child[$dk];
               
            }
           
            //dump($da);die;
            return $da;

        }






        /*最高管理员递归调用*/
        public function digui3($da,$pid=0)
        {
             $child=array();
           
            if($pid==$da['parent_id'])
            {
                $privilege=M('privilege');
                $two=$privilege->where('parent_id='.$pid)->select();
                $child=$two;
            }
           
            if(empty($child))
            {
                return null;
            }

             /*第三级*/
            foreach($child as $key=>$val)
            {
                $privilege=M('privilege');
                $three=$privilege->where('parent_id='.$val['privilege_id'])->select();
                if($three)
                {
                    $child[$key]['child']=$three;//child表示第三级的名称代名词
                }
            }
            //dump($child);die;

            foreach ($child as $key => $value) {
                $privilege=M('privilege');
                foreach($value['child'] as $k=>$v)
                {
                    $four=$privilege->where('parent_id='.$v['privilege_id'])->select();
                    $value['child'][$k]['childs']=$four;

                }
                
                
                $data[$key]=$value;//value赋值给了数组data，key表示数组键值
            }
            //dump($data);die;
            return $data;
        }






        /*
        *   用户登录页面操作
        */
        public function logadd($uname,$userip,$logstarttime){
            //echo $uname.$userip.$logstarttime;die;
            $data['logname'] = $uname;
            $data['logip'] = $userip;
            $data['logstarttime'] = $logstarttime;
           // print_r($data);die;

            return $this->Table("log")->add($data);
        }


        public function logsele(){
            return $this->Table("log")->order("id desc")->limit(1)->select();
        }

        public function logout(){
            //接收id信息
            $id = $_GET['id'];
            $logendtime = date("Y-m-d H:i:s",time());
            $data['logendtime'] = $logendtime;
            return $this->Table("log")->where("id='$id'")->save($data);
        }
}
?>