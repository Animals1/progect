<?php
/*
 *@author:hanqiming
 *@date  :2016-4-14
 *@tablename:支付方式model
 * */
namespace Home\Model;
use Think\Model;
class PaymentMethodModel extends Model {
    /*
     * 查询数据
     * */
    public function getvalue()
    {
        return $this->select();
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