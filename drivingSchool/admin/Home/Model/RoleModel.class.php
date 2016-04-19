<?php
/*
 *@author:
 *@date  :2016-4-19
 *@tablename:角色表
 * */
namespace Home\Model;
use Think\Model;
class RoleModel extends Model {

    /**
     * 查询全部的角色
     */
    public function getvalue(){
        return $this->select();
    }
}