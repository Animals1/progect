<?php
/*
 *@author:xueyunhuan
 *@date  :2016-4-13
 *@tablename:预约申请
 * */
namespace Home\Model;
use Think\Model;
class StuOrderModel extends Model {
    /*
     * 查询预约记录
     * @$where  条件
     * @$limit  限制几条数据
     * */
    public function getadd($user_id)
    {
        $page=$_GET['page']?$_GET['page']:1;
        $page_size=3;
        $limit=($page-1)*$page_size;

        $num=$this->count();
        $yeshu=ceil($num/$page_size);
        $data=$this->join('student on student.stu_id = stu_order.stu_id')->join('coach on coach.coach_id = stu_order.coach_id')->where("user_id=2")->select();
        $arr=array($yeshu,$data);
        return $arr;
    }
}
?>