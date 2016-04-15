<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:油气添加表
 * */
namespace Home\Model;
use Think\Model;
class GasAddModel extends Model {
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
     * 申请车辆
     * */
    public function carApplication()
    {
        $carApplication=M('car');
        return $carApplication->select("car_number");
    }

    /*
     * 油气添加
     * */
    public function addGas($data)
    {
        $data['gas_addtime']=time();
        $add=$this->add($data);
        if($add)
        {
            return $add;
        }
        else
        {
            return false;
        }
    }

    /*
     * 油气添加记录
     * */
    public function gasRecord()
    {
        return $this->select();
    }

    /*
     * 筛选
     * 根据汽油类型id分组查询汽油名称
     * */
    public function gasScreening($Screen)
    {
        return $this->join('gas_type on gas_add.gas_type_id=gas_type.gas_type_id')->field('gas_type_name')->where($Screen)->group('gas_type_id')->select();
    }
}
?>