<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:车辆更换表
 * */
namespace Home\Model;
use Think\Model;
class CoachModel extends Model {
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
     *教练信息
     * */
    public function coachMessage($where=1)
    {
        return $this->join('coach_group on coach.group_id=coach_group.group_id')->where($where)->select();
    }
    /*
     * 修改
     * */
    public function updatecoach($data,$where)
    {
        $this->where($where)->save($data);
    }
    /*
     * 新增分组
     * 表单里用复选框遍历出来没有分组的每个人
     * */
    public function addGroup($data)
    {
        return $this->add($data);
    }
    /*查询没有分组的人*/
    public function noGroup()
    {

        $where="group_id=0";
        return $coach_group=$this->coachMessage($where);
    }
    /*查询所有组名*/
    public function groupName()
    {
        $group_name=M('CoachGroup');
        return $group_name->select();
    }



}
?>