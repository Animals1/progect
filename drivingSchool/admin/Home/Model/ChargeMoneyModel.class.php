<?php
/*
 *@author:hechengwei
 *@date  :2016-4-13
 *@tablename :收费明细表~费用类型表派生表
 * */
namespace Home\Model;
use Think\Model;
class ChargeMoneyModel extends Model {
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
}
?>