<?php
/*
 *@author:hechengwei
 *@date  :2016-4-13
 *@tablename:考证进度
 * */
namespace Home\Model;
use Think\Model;
class ProgressModel extends Model {
    /*
     * 查询数据(考证进度)
     * @$where  条件
     * */
    public function getshow($user_id)
    {
        $arr=$this->Table('student')->where("user_id = 2")->select();
        $arr1 = $this->where("stu_id = $arr[0]['stu_id']")->select();
        return $arr1;
    }
}
?>