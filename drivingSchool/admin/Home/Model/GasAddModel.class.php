<?php
/*
 * @author:yaobowen
 * @date  :2016-4-15
 * @tablename:油气添加表
 * */
namespace Home\Model;
use Think\Model;
class GasAddModel extends Model {
    /**
     * 查询数据
     */
    public function getValue($name)
    {
        return $this->where("applicant_name = '$name'")
					->join('gas_type_id on gas_add.gas_type_id=gas_type_id.gas_type_id')
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
    public function addCarreplace($data)
    {
        $data['gas_addtime']=time();
		return $this->add($data);
    }

    

    /*
     * 查询汽油名称
     * */
    public function gasScreening()
    {
        return $this->join('gas_type_id on gas_add.gas_type_id=gas_type_id.gas_type_id')->field('gas_type_name')->select();
    }
}
?>