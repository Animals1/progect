<?php
/*
 * @author:yaobowen
 * @date  :2016-4-15
 * @tablename:汽车维修表
 * */
namespace Home\Model;
use Think\Model;
class CarRepairModel extends Model {
    /**
     * 查询数据
     */
    public function getValue($name)
    {
        return $this->where("repair_name = '$name'")
					->join('repair_status on car_repair.repair_statusid=repair_status.repair_statusid')
					->select();
    }
    /*
     * 删除一条数据
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }

    /*
     * 换车记录添加
     *
     * */
    public function addCarrepair($data)
    {
		return $this->add($data);
    }

    

    
}
?>