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
    public function getshow()
    {
        $user_id = $_COOKIE['userid'];
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->join("coach on coach.coach_id = stu_order.coach_id")->join("staff on staff.staff_id  = coach.coach_staff_id")->join("class on class.class_id = stu_order.class_id")->join("time_table on time_table.time_id = stu_order.time_id")->where("stu_id = $user_id")->field('staff_name,class_name,add_time,time_section,stu_order_status')->page($p,2)->select();
        $count      = $this->join("coach on coach.coach_id = stu_order.coach_id")->where("stu_id=$user_id")->count();
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
    public function getadd($class_id,$coach_id){
        $data['coach_id'] = $_POST['coach_id'];
        $data['class_id'] = $_POST['class_id'];
        $data['time_id'] = $_POST['time_id'];
        $data['add_time'] = date("y-m-d H:i:s");
        $data['stu_id'] = $_COOKIE['userid'];
        return $this->add($data);
    }
    /*
     * 查询取消预约记录 (xueyunhuan)
     * @$where  条件
     * */
    public function noorder(){
        $user_id = $_COOKIE['userid'];
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$this->join("coach on coach.coach_id = stu_order.coach_id")->join("staff on staff.staff_id  = coach.coach_staff_id")->join("class on class.class_id = stu_order.class_id")->join("time_table on time_table.time_id = stu_order.time_id")->where("stu_order_status=0 AND stu_id = 2")->field('staff_name,class_name,add_time,time_section,stu_order_status')->where("stu_order_status = 0 && stu_id = $user_id")->page($p,2)->select();
        $count      = $this->where("stu_order_status = 0 && stu_id = $user_id")->count();
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
    public function selectAppointment()
    {
        $sql="select coach.coach_id,car.car_number,staff.staff_name,group_concat(student.stu_name) as student_name,group_concat(time_table.time_id) as time from stu_order inner join student on student.stu_id=stu_order.stu_id inner join coach on coach.coach_id=stu_order.coach_id inner join time_table on time_table.time_id=stu_order.time_id inner join staff on coach.coach_staff_id=staff.staff_id inner join car on coach.car_id=car.car_id group by staff.staff_name order by time_table.time_id ASC ";
       $arr=$this->query($sql);
        return $arr;
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
    /*
     * 查询id所属时间段是否有预约
     * @ $time 传递过来的时间  传递小时然后*60转换成分钟
     * @ $where 传递那个学员为条件
     *
     * */
    public function time_table($time_id)
    {
        $time_id = $_GET['time_id'];
        $coach_id = $_GET['coach_id'];
        $arr = $this->where("time_id = $time_id && coach_id =$coach_id ")->select();
        return $arr;
    }
}

?>