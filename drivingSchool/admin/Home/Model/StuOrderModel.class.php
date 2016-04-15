<?php
 /*
  *@author:xueyunhuan
  *@date  :2016-4-13
  *@tablename:预约申请
  * 
  */
namespace Home\Model;
use Think\Model;
class StuOrderModel extends Model {
    /*
     * 查询预约记录 (xueyunhuan)
     * @$where  条件
     * @$limit  限制几条数据
     * */
    public function getshow($user_id)
    {
        $user = M('stu_order');
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->join('student on student.stu_id = stu_order.stu_id')->join('coach on coach.coach_id = stu_order.coach_id')->where("user_id=2")->page($p,3)->select();
        $count      = $user->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $arr = array($p,$list,$page);
        return $arr;
    }
    /*
     * 申请预约  (xueyunhuan)
     * @$stu_id = $_POST['stu_id'];
     * @$coach_id = $_POST['coach_id'];
     * @$class_id = $_POST['class_id'];
     * @$time_id = $_POST['time_id'];
     * @$add_time = $_POST['add_time'];
    */
    public function getadd($data){
        return $this->add($data);
    }
    /*
     * 查询取消预约记录 (xueyunhuan)
     * @$where  条件
     * */
    public function noorder(){
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->where("stu_order_status=0")->page($p,3)->select();
        $count      = $this->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $arr = array($p,$list,$page);
        return $arr;
    }
}
?>