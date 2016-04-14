<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:教练等级表
 * */
namespace Home\Model;
use Think\Model;
class CoachGrandeModel extends Model {
    /**
     * 查询全部数据
     */
    public function getValue()
    {
        return $this->select();
    }
    /*
     * 删除一条数据数据
     */
    public function delValue()
    {
        return $this->where("grade_id ='$id'")->delete();
    }
}
?>