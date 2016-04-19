<?php
/*
 * @author:hanqiming
 * @date  :2016-4-18
 * @tablename:状态表
 * */
namespace Home\Model;
use Think\Model;
class StatusModel extends Model {

    /**
     * 查询全部的信息
     */
    public function getvalue(){
        return $this->select();
    }
}