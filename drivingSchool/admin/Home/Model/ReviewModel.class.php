<?php
/*
 *@author:yaobowen
 *@date  :2016-4-15
 *@tablename:学员评价
 * */
namespace Home\Model;
use Think\Model;
class ReviewModel extends Model {
	/**
     * 	查询数据,分页
     */
    public function getValue($where)
    {
		$count      = $this->where($where)->count();
		// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,1);
		// print_r($Page);die;
		// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $this->where($where)
					->limit($Page->firstRow.','.$Page->listRows)
					->join('student ON review.stu_id = student.user_id' )
					->select();
		$arr = array($show,$list);
		return $arr;
		
    }
	/**
	*	查询教练的信息
	*/
	public function getonevalue($where){
		return $this->where($where)
					->join('coach ON review.coach_id = coach.coach_id' )
					->join('staff ON coach.coach_staff_id = staff.staff_id' )
					->find();
	}
    /**
     * 删除一条数据
     */
    public function delValue($id)
    {
        return $this->where("coach_id = '$id'")->delete(); 
    }
}
?>