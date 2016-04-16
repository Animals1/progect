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
            ->where("admin.admin_id=$cooid")
            ->select();
        }
}
?>