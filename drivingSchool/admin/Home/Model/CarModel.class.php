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
    public function getValue($where=1,$order,$limit)
    {
        return $this->join("coach_model on car.model_id=coach_model.model_id")->join("car_status on car.car_status=car_status.status_id")->join("coach_motor_model on car.motor_id=coach_motor_model.motor_id")->join("car_type on car.type_id=car_type.type_id")->where($where)->order("$order")->limit($limit)->select();
    }
    /*
     * 修改数据
     *@$where   条件
     * */
    public function updateValue($where=1,$data)
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
        return $model->where($where)->find();
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