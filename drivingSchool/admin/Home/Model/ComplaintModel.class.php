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
    public function getValue($where,$order,$limit)
    {
        return $this->where($where)->order("$order")->limit($limit)->find();
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
        return $this->select('complaint_name');
    }
}
?>