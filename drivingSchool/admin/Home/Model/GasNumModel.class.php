<?php
/*
 * @author:yaobowen
 * @date  :2016-4-21
 * @tablename:汽油数量表
 * */
namespace Home\Model;
use Think\Model;
class GasNumModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue()
    {
        return $this->join("gas_type ON gas_num.t_id = gas_type.gas_type_id")
					->join("gas_month ON gas_num.m_id = gas_month.m_id")
					->select();
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }

}
?>