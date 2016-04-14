<?php
/*
 *@author:hechengwei
 *@date  :2016-4-13
 *@tablename:支出明细
 * */
namespace Home\Model;
use Think\Model;
class ExpenseModel extends Model {
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
}
?>