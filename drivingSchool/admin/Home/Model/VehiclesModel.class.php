<?php
/*
 * @author:hechengwei
 * @date  :2016-4-17
 * @tablename:车辆表
 * */
namespace Home\Model;
use Think\Model;
class VehiclesModel extends Model
{
    /*
     * 查询车辆登记数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * @car 车辆登记表
     * @coach_model 准教车型表
     * @coach_motor_model 教练车型
     * @car_type 可预约类型
     * @
     * */
    public function getValues()
    {
        return $this->join('coach_driving on vehicles.driving_id=coach_driving.driving_id')->join('coach_motor on vehicles.motor_id=coach_motor.motor_id')->join('car_status on vehicles.car_status=car_status.status_id')->join('car_type on vehicles.type_id=car_type.type_id')->select();
    }

    /*
     * 修改数据
     *@$where   条件
     * ->join('car_repair on car.repair_id=car_repair.repair_id')
     *
     * */
    public function updateValue($where = 1, $data)
    {
        return $this->where($where)->save($data);
    }

    /*
     * 删除车辆表信息
     * */
    public function delCar($where)
    {
        return $this->where($where)->delete();
    }

    /*
     * 车型下拉框
     * */
    public function carModel()
    {
        $model = M('CoachDriving');
        return $model->select();
    }

    /*
     * 可预约类型
     */
    public function carType()
    {
        $model=M('CarType');
        return $model->select();
    }


    /*
   * 教练车型下拉框
   * */
    public function carMotor()
    {
        $model = M('CoachMotor');
        return $model->select();
    }

    /*
     * 车辆状态
     * */
    public function carStatus()
    {
        $model=M('CarStatus');
        return $model->select();
    }

    /*
     * 搜索
     * @驾照等级
     * @车型
     * @状态
     * @车牌号
     * @行驶证号
     * */
    public function searchValue($where=1)
    {
        return $this->join('coach_driving on vehicles.driving_id=coach_driving.driving_id')->join('coach_motor on vehicles.motor_id=coach_motor.motor_id')->join('car_status on vehicles.car_status=car_status.status_id')->join('car_type on vehicles.type_id=car_type.type_id')->where($where)->select();
    }

    /*============================================================新增车辆==================================================================*/

    /*
     * 新增车辆
     * 传过来个一个处理好的数组,直接添加
     * */
    public function addCar($data)
    {
        return $this->add($data);
    }


}
?>