<?php
/*
 *@author:xueyunhuan
 *@date  :2016-4-13
 *@tablename:考证进度
 * */
namespace Home\Model;
use Think\Model;
class ProgressModel extends Model {
    /*
     * 查询数据(考证进度)(xueyunhuan)
     * @$where  条件
     * */
    public function getshow()
    {
    	$user_id = $_COOKIE['userid'];
        $arr=$this->join('student on student.stu_id = progress.stu_id')->where("user_id = $user_id")->select();
        return $arr;
    }
}
?>