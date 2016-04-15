
<?php
/*
 * @author:hechengwei
 * @date  :2016-4-14
 * @tablename:车辆维修记录表
 * */
namespace Home\Model;
use Think\Model;
class CarRepairModel extends Model {
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
    * 车辆出勤状态
    * 查询车辆出勤状态
    * */
    public function carGoingstatus()
    {
        return $this->join("car_goout on car.out_id=car_goout.out_id")->join('car_status on car_goout.out_status_id=car_status.status_id')->select();
    }
    /*
     * 车辆出勤车型下拉
     * */
    public function optionGoing()
    {
        $coach_motor_model=M('Coach_motor_model');
        return $coach_motor_model->select();
    }
    /*
     *车辆出勤下拉教练车型
    */
       public function optioncCoach()
    {
        $coach_motor_model=M('Coach_motor_model');
        return $coach_motor_model->select();
    }
    /*
     *车辆出勤搜索
    */
       public function gooutSearch($where=1)
    {
        return $coach_motor_model->where($where)->select();
    }
    /*
     * 车辆维修查询
     * @ $where 查询条件
     * @ repair_status 车辆维修状态表
     * */
    public function searchRepair($where)
    {

        return $this->join("repair_status on car_repair.repair_statusid=repair_status.repair_statusid")->where($where)->find();

    }
}
?>



