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
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->join("coach on coach.coach_id = stu_order.coach_id")->join("role on role.role_id = coach.role_id")->join("staff on staff.role_id = role.role_id")->join("class on class.class_id = stu_order.class_id")->join("time_table on time_table.time_id = stu_order.time_id")->where("stu_id = 2")->field('staff_name,class_name,add_time,time_section,stu_order_status')->page($p,2)->select();
        $count      = $this->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
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
    public function noorder($user_id){
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->join("coach on coach.coach_id = stu_order.coach_id")->join("role on role.role_id = coach.role_id")->join("staff on staff.role_id = role.role_id")->join("class on class.class_id = stu_order.class_id")->join("time_table on time_table.time_id = stu_order.time_id")->where("stu_order_status=0 AND stu_id = 2")->field('staff_name,class_name,add_time,time_section,stu_order_status')->page($p,2)->select();
        $count      = $this->where("stu_order_status = 0")->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        
        return $arr;
    }

    /*
     * author:hechengwei
    * 行政教练排课
     * 所有教练的预约课程情况
     * $where  查询状态
    * */
    public function coachClass($where=1)
    {
        $this->join('coach on stu_order.coach_id=coach.coach_id')->join('student on stu_order.stu_id=student.stu_id')->join('class on stu_order.class_id=class.class_id')->join('time_table on stu_order.time_id=time_table.time_id')->join('coach_motor_model on coach.motor_id=coach_motor_model.model_id')->where($where)->select();
    }

    /*
     * 教练学时
     * @ $time 传递过来的时间  传递小时然后*60转换成分钟
     * @ $where 传递那个学员为条件
     *
     * */
    public function coachTime($time,$where)
    {
        $progress=M('progress');
        $test_time=$progress->where($where)->select();
        if($test_time['test_one']>0)
        {
            $new_time=$test_time['test_one']-$time;
        }
        elseif($test_time['test_two']>0)
        {
            $new_time=$test_time['test_two']-$time;
        }
        else
        {
            $new_time=$test_time['test_three']-$time;
        }
        return $progress->where($where)->save($new_time);
    }
}
?>