<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:课程表
 * */
namespace Home\Model;
use Think\Model;
class ClassModel extends Model {
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