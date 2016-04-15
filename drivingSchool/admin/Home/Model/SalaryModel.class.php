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
    public function getValue()
    {
        $page=$_GET['page']?$_GET['page']:1;
        $page_size=3;
        $limit=($page-1)*$page_size;
        $num=$this->count();
        $page_list=ceil($num/$page_size);
        $re = $this->join('staff on salary.staff_id=staff.staff_id')->select();
        $arr = array($page_list,$re);
        return $arr;
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