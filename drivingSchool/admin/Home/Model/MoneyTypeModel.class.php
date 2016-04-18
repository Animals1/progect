<?php
/*
 * @author:hanqiming
 * @date  :2016-4-14
 * @tablename:费用类型表
 * */
namespace Home\Model;
use Think\Model;
class MoneyTypeModel extends Model {
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