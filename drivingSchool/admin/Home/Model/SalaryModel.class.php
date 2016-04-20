<?php
/*
 *@author:hechengwei
 *@date  :2016-4-13
 *@tablename:工资明细表
 * */
namespace Home\Model;
use Think\Model;
class SalaryModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * hanqiming
     * */
    public function getvalue()
    {
		
        $User = M('salary'); // 实例化User对象
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list = $User->join('staff on salary.staff_id=staff.staff_id')->join('role on staff.role_id=role.role_id')->join('salary_status on salary.salary_status_id=salary_status.salary_status_id')->where('salary_id>0')->order('salary_id desc')-> page($p.',2')->select();
        $count      = $User->where('salary_id>0')->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $data = array($list,$count,$show,$p);
        return $data;
    }


    /**
     * 多添件搜索
     */
    public function searchs(){
        $arr = I('post.');

        foreach ($arr as $k => $v) {
            if ($v=='') {
                unset($arr[$k]);
            }
        }
        $sql='';
        $i=0;
        foreach ($arr as $k => $v) {
            if($i!=0){
                $sql.=' and ';
            }
            $sql.="$k like '%$v%'";
            $i++;
        }
        $User = M("salary");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('staff on salary.staff_id=staff.staff_id')->join('role on staff.role_id=role.role_id')->join('salary_status on salary.salary_status_id=salary_status.salary_status_id')->where($sql)->page($p,2)->select();
        $count = $User->join('staff on salary.staff_id=staff.staff_id')->join('role on staff.role_id=role.role_id')->join('salary_status on salary.salary_status_id=salary_status.salary_status_id')->where($sql)->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }



    /*
     * 删除数据
     *@$where   条件
     * */
    public function delvalue()
    {
        $id = $_GET['id'];
        return $this->where("salary_id=$id")->delete();
    }


    /**
     * 添加数据
     */
    public function addvalue(){
        $date['role_id'] = $_POST['role_id'];
        $date['staff_id'] = $_POST['staff_id'];
        $date['salary_day'] = $_POST['salary_day'];
        $date['salary_status_id'] = $_POST['salary_status_id'];
        $date['salary_wages'] = $_POST['salary_wages'];
        return $this->Table('salary')->add($date);
    }

    /**
     * 工资明细（表）
     */
    public function selvalue(){
        $id = $_GET['id'];
        return $this->join('staff on salary.staff_id=staff.staff_id')->join('role on staff.role_id=role.role_id')->join('salary_status on salary.salary_status_id=salary_status.salary_status_id')->where("salary_id=$id")->find();
    }


    /**
     * 工资明细（状态表）
     */
    public function getstatus(){
        return $this->Table('salary_status')->select();
    }
}
?>