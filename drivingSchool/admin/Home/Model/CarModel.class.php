<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:车辆登记表
 * */
namespace Home\Model;
use Think\Model;
class CarModel extends Model {
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
    public function getValue($where,$order,$limit)
    {
        return $this->join("car.model_id=coach_model.model_id")->join("car.car_status=car_status.status_id")->join("car.motor_id=coach_motor_model.motor_id")->join("car.type_id=car_type.type_id")->where($where)->order("$order")->limit($limit)->select();
    }
    /*
     * 修改数据
     *@$where   条件
     * */
    public function updateValue($where,$data)
    {
        return $this->where($where)->save($data);
    }

    /*
     * 车型下拉框
     * */
    public function carModel()
    {
        $model=M('coach_model');
        return $model->select();
    }

    /*
   * 教练车型下拉框
   * */
    public function carMotor()
    {
        $model=M('coach_motor_model');
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
        return $model->where("$where='car_number' or $where='license_number'")->find();
    }

    /*============================================================新增车辆==================================================================*/

    /*
     * 新增车辆
     * 穿过来个一个处理好的数组,直接添加
     * */
    public function addCar($data)
    {
        return $this->add($data);
    }
    /*
     * 车辆出勤状态
     * */
    public function goingOut()
    {

    }
}
?>