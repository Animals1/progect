<?php
/*
 * @author:xueyunhuan
 * @date  :2016-4-13
 * @tablename:学员报名表
 * */
namespace Home\Model;
use Think\Model;
class StudentModel extends Model {
    /*
     * xueyunhuan
     * 查询用户数据
     * @$where  条件
     * */
    public function getshow($user_id)
    {
        return $this->join('class on student.class_id = class.class_id')->where("user_id=2")->select();
    }
}
?>