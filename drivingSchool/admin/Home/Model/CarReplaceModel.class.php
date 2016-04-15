<?php
/*
 * @author:yaobowen
 * @date  :2016-4-15
 * @tablename:车辆更换表
 * */
namespace Home\Model;
use Think\Model;
class CarReplaceModel extends Model {
    /**
     * 	查询相对教练的换车记录数据
     */
    public function getValue($name)
    {
        return $this->where("relace_name = '$name'")->select();
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
    public function addCarreplace($data)
    {
        return $this->add($data);
    }

}
?>