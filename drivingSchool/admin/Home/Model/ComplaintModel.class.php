<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:投诉表
 * */
namespace Home\Model;
use Think\Model;
class ComplaintModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where=1)
    {
        $User = M("Complaint");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('staff on complaint.complaint_name=staff.staff_id')->join('student on complaint.stu_id=student.stu_id')->where($where)->page($p,2)->select();
        $count = $User->join('staff on complaint.complaint_name=staff.staff_id')->join('student on complaint.stu_id=student.stu_id')->where($where)->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
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

    /*
     * 投诉管理+下拉搜索
     * @ $where 条件
     * */
    public function complaincontrol($where=1)
    {
        $this->join('student on complain.stu_id=student.stu_id')->where($where)->select();
    }


    /*
     * 被投诉人下拉列表
     * */
    public function selectComplain()
    {
        return $this->join('staff on complaint.complaint_name=staff.staff_id')->join('student on complaint.stu_id=student.stu_id')->select();
    }
}
?>