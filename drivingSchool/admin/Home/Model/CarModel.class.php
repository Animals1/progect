<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:车辆登记表
 * */
namespace Home\Model;
use Think\Model;
class CarModel extends Model
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
    public function getValues($where)
    {
        return $this->join("coach_model on car.model_id=coach_model.model_id")->join("coach_motor on car.motor_id=coach_motor.motor_id")->join("car_goout on car.out_id=car_goout.out_id")->join("car_status on car_goout.out_status_id=car_status.status_id")->join('car_repair on car.repair_id=car_repair.repair_id')->join('coach_driving on coach_motor.driving_type=coach_driving.driving_id')->where($where)->select();
    }
    /*
     * 车辆状态
     * 预约为预约,预约时间短
     * 车辆维修状态,修好没修好
     * 车辆更换状态
     * */
    public function getGoout($where=1)
    {
        return $this->join('car_status on car.car_status=car_status.status_id')->join('car_type on car.type_id=car_type.type_id')->join('car_goout on car.out_id=car_goout.out_id')->join('coach on car_goout.out_coachid=coach.coach_id')->join('time_table on car_goout.out_time=time_table.time_id')->join('student on car_goout.out_user_id=student.stu_id')->where($where)->select();
    }
    /*
     * 车辆维修记录查询
     * */
    public function vehrepair($where=1)
    {
        $repair=M('car_repair');
        return $repair->join('coach on car_repair.repair_coachname=coach.coach_id')->join('staff on coach.coach_staff_id=staff.staff_id')->join('car on car_repair.repair_carid=car.car_id')->join('repair_status on car_repair.repair_statusid=repair_status.repair_statusid')->where($where)->select();
    }

    /*
     * 车辆
     * */
    public function vehicles()
    {
        return $this->select();
    }
    /*
     * 修改数据
     *@$where   条件
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
     * 驾照
     * */
    public function coachDriving()
    {
        $model=M('CoachDriving');
        return $model->select();
    }

    /*
   * 教练车型下拉框
   * */
    public function coachMotor()
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
     * 时刻
     * */
    public function timetable()
    {
        $model=M('time_table');
        return $model->select();
    }
    /*
     * 搜索
     * @车牌号
     * @行驶证号
     * */
    public function searchValue($where=1)
    {
        $model=M('car');
        return $model->where($where)->find();
    }

    /*============================================================新增车辆==================================================================*/

    /*
     * 新增车辆
     * 传过来个一个处理好的数组,直接添加
     * */
    public function addCar($data)
    {
        $veh=M('Vehicles');
        $veh->add($data);
        return $this->add($data);
    }


}
?>