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
        return $this->join('class on student.class_id = class.class_id')->where("user_id=2")->select();
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
        return $this->add($data);
    }

        /*
         * author:hechengwei
         * 减少冗余代码,封装方法*/
        public function selectstudent($where=1)
        {
            return $this->join('class on student.class_id=class.class_id')->join('student_status on student.stu_status_id=student_status.stu_status_id')->join('progress on progress.stu_id=student.stu_id')->where($where)->select();
        }


}
?>