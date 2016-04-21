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
     * @$where  条件（user_id）
     * */
    public function getshow()
    {
    	$user_id = $_COOKIE['userid'];
        $arr=$this->join('student on student.stu_id = progress.stu_id')->where("user_id = $user_id")->find();
        return $arr;
    }
    /*
     * 查询数据(考证进度)(xueyunhuan)
     * @$where  条件（stu_id）
     * */
    public function stushow($stu_id)
    {
        $arr=$this->join('student on student.stu_id = progress.stu_id')->where("progress.stu_id = $stu_id")->find();
        return $arr;
    }
}
?>