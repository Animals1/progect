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
     * 学员个人信息查询
     * @$where  条件
     * */
    public function getshow($user_id)
    {
        $user_id = $_COOKIE['userid'];
        return $this->join('class on student.class_id = class.class_id')->join("student_status on student_status.stu_status_id = student.stu_status_id")->where("user_id=$user_id")->find();
    }

    /*
     * author:hechengwei
     * 学习阶段下拉
     * */
    public function progress()
    {
        $progress=M('Progress');
        return $progress->select();
    }
    /*
     * author:hechengwei
     * 车型下拉
     * */
    public function coach_motor_model()
    {
        $coach_motor_model=M('CoachMotorModel');
        $coach_motor_model->select();
    }
    /*
     * author:hechengwei
     * 性别
     * */
    public function sex()
    {
        $this->select('stu_sex');
    }
    /*
    * author:hechengwei
    * 状态
    * */
    public function student_status()
    {
        $student_status=M('student_status');
        $student_status->select();
    }


    /*
     * author:hechengwei
     * 行政管理学员报名列表
     * 查询关联表所有值,查询统计出来每个课程有多少人,组合数组,给所有值的数组新建一个下标为num的K,把值循环添加到K里,返回数组
     * */
    public function studentregirtion()
    {
        $data=$this->selectstudent();

        $count_num=$this->join('class on student.class_id=class.class_id')->group('student.class_id')->having('count(stu_id) as num')->select();

        foreach($data as $data_key=>$data_val)
        {
            foreach($count_num as $num_key=>$num_val)
            {
                $data[$num_key]['num']=$num_val;
            }
        }
        return $data;
    }
    /*
     * author:hechengwei
     * 行政管理在校学员
     * */
    public function stuinschool()
    {
       return $data=$this->selectstudent();
    }

    /*
     *搜索
     *
     * */
    public function searchStudent($where=1)
    {
        return $this->selectstudent($where);
    }

    /*
     * 在校学员修改
     * */
    public function stuUpdate($data,$where)
    {
        return $this->where($where)->save($data);
    }

    /*
     * 入学登记
     * */
    public function inschoolRecord($data)
    {
        $stu=$this->where("stu_sn='$data[stu_sn]'")->find();
        if($stu['stu_status_id']=='4')
        {
            $data['stu_status_id']=1;
            return $this->where("stu_sn='$data[stu_sn]'")->save($data);
        }
        else
        {
            $data['stu_status_id']=1;
            return $this->add($data);
        }

    }


        /*
         * author:hechengwei
         * 减少冗余代码,封装方法*/
        public function selectstudent($where=1)
        {
            return $this->join('class on student.class_id=class.class_id')->join('student_status on student.stu_status_id=student_status.stu_status_id')->join('progress on progress.stu_id=student.stu_id')->where($where)->select();
        }

    /**
     * author:hanqiming
     * 查询学员姓名
     */
    public function allvalue(){
        return $this->field('stu_id,stu_name,stu_sn')->select();
    }
    /*
     *author：xueyunhuan
     *查询学生信息
    */
    public function allstudent(){
            $arr = I('post.');
            $aa = $_GET['textfield'];
            if(!empty($aa)) {
                $arr = I('get.');
            }
            foreach ($arr as $k => $v) {
              if ($v=='') {
                 unset($arr[$k]);
              }
            }

            $sql='';
            $i=0;
            foreach ($arr as $k => $v) {
              if($i!=0){
                  $sql.=' and ';
              }
               $sql.="$k like '%$v%'";
               $i++;
            }
            
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list=$this->join('class on student.class_id = class.class_id')->join("student_status on student_status.stu_status_id = student.stu_status_id") ->where($sql)->page($p,2)->select();
            $count      = $this->where($sql)->count();
            $page       = new \Think\Page($count,2);
            $show       = $page->show();
            $arr1 = array($p,$list,$show,$count);
            return $arr1;
    }
    /*
     *author：xueyunhuan
     *查询学生信息 
    */

    public function studentinfo($where){
        $User = M("Student");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('class on student.class_id = class.class_id')->join("student_status on student_status.stu_status_id = student.stu_status_id")->join('sex on student.stu_sex=sex.sex_id')->where($where)->page($p,2)->select();
        $count = $User->join('class on student.class_id = class.class_id')->join("student_status on student_status.stu_status_id = student.stu_status_id")->join('sex on student.stu_sex=sex.sex_id')->where($where)->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }


    /*
     * 在校学员状态
     * */

    public function inschoolstu($where=1)
    {
        $User = M("Student");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('sex on student.stu_sex=sex.sex_id')->join('student_status on student.stu_status_id=student_status.stu_status_id')->join('coach_motor on student.motor_id=coach_motor.motor_id')->join('progress on student.stu_id=progress.stu_id')->where($where)->page($p,2)->select();
        $count = $User->join('sex on student.stu_sex=sex.sex_id')->join('student_status on student.stu_status_id=student_status.stu_status_id')->join('coach_motor on student.motor_id=coach_motor.motor_id')->join('progress on student.stu_id=progress.stu_id')->where($where)->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }
    /*状态*/
    public function status()
    {
        $status=M('student_status');
        return $status->select();
    }
    /*驾照*/
    public function driving()
    {
        $driving=M('coach_driving');
        return $driving->select();
    }
    /*
     * 地区
     * */
    public function area($area)
    {
        $region=M('region');

        $stu_birthplace=$region->where("region_id in ($area[0])")->select();
        $stu_curaddress=$region->where("region_id in ($area[1])")->select();
        $birthplace[]=$stu_birthplace;
        $birthplace[]=$stu_curaddress;
        return $birthplace;

    }

}
?>