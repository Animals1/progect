<?php
/*
 * @author:hechengwei
 * @date  :2016-4-16
 * @tablename:驾照类型表
 * */
namespace Home\Model;
use Think\Model;
class CoachDrivingModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue()
    {
        return $this->select();
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