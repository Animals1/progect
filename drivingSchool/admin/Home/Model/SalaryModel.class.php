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
     * */
    public function getvalue()
    {
<<<<<<< HEAD
        $User = M('salary'); // 实例化User对象
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list = $User->join('staff on salary.staff_id=staff.staff_id')->join('role on staff.role_id=role.role_id')->join('salary_status on salary.salary_status_id=salary_status.salary_status_id')->where('salary_id>0')->order('salary_id desc')-> page($p.',3')->select();
        $count      = $User->where('salary_id>0')->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $data = array($list,$count,$show);
        return $data;
=======
        $page=$_GET['page']?$_GET['page']:1;
        $page_size=3;
        $limit=($page-1)*$page_size;
        $num=$this->count();
        $page_list=ceil($num/$page_size);
        $re = $this->join('staff on salary.staff_id=staff.staff_id')->select();
        $arr = array($page_list,$re);
        return $arr;
>>>>>>> 5d4bd42d4255ddcc7adc120c221cb83ca3c56a74
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }
}
?>