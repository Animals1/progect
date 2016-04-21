<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:教练车型表
 * */
namespace Home\Model;
use Think\Model;
class CoachMotorModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue()
    {
        return $this->join('coach_model on coach_motor.model_id=coach_model.model_id')->join('coach_driving on coach_motor.driving_type=coach_driving.driving_id')->select();
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
     * 车辆设置添加教练车类型
     * */
    public function addcoachmotor($data)
    {
        return $this->add($data);
    }
}
?>