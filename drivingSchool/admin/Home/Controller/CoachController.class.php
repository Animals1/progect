<?php
	/**
	*	@管理员模块----教练
	*	author：yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
	/**
	*	查询当前教练的信息，返回一维数组
	*/
	public function personal_info(){
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		if($rolename=="最高管理"){
			echo "最高管理员";
		}
		else
		{
			$name = $_COOKIE['username'];
			$model = D('Staff');
			$arr = $model->getvalue($name);
			// print_r($arr);die;
			$this->assign('arr',$arr);
			$this->display('personal_info');
		}
		
		
	}
	/**
	*	查询关于该教练的评价
	*/
    public function award(){
		$role = D("admin");
		$isrole = $role->isrole();
		$rolename = $isrole[0]["role_name"];
		$id = $_COOKIE['userid'];
		$model = D('Review');
		if($rolename=="最高管理"){
			echo "最高管理员";
			
		}
		else
		{
			$where = "coach_id = '$id'";
			// 关于该教练的评价
			$arr = $model->getvalue($where);
			//关于教练的分数
			$fraction = $model->getnum($where);
			//获取各个学员的评分
			foreach($fraction as $k=>$v){
				$num['service_num'] += $v['service_num'];
				$num['teach_num'] += $v['teach_num'];
				$num['behavior_num'] += $v['behavior_num'];
				$num['honest_num'] += $v['honest_num'];
				$num['total_num'] += $v['total_num'];
				//求出教练在多个方面和总分的平均分
				$cnum['zong_service_num'] = round($num['service_num']/($k+1),'1');
				$cnum['zong_teach_num'] = round($num['teach_num']/($k+1),'1');
				$cnum['zong_behavior_num'] = round($num['behavior_num']/($k+1),'1');
				$cnum['zong_honest_num'] = round($num['honest_num']/($k+1),'1');
				$cnum['zong_total_num'] = round($num['total_num']/($k+1),'1');
				
			}
				// print_r($cnum);die;
				$models = D('Coach');
				$res = $models->where("$where")->save($cnum);
				
				
			//查询登录教练的信息
			$where = "review.coach_id = '$id'";
			$one = $model->getonevalue($where);
			//判断总分，给出满意级别
			$one['zong_total_num'] = $this->coachreward($cnum['zong_total_num']);
			
			$show = $arr['0'];
			$list = $arr['1'];
			foreach($list as $k=>$v){
				$list[$k]['total_num'] = $this->coachreward($v['total_num']);
				
			}
			
			// print_r($list);die;
			$this->assign('list',$list);
			$this->assign('one',$one);
			$this->assign('page',$show);
			$this->display('award'); 
		}
		
		
		

        }
    public function leave(){
    	$this->display('leave');
        }      
    public function attendance(){
    	$this->display('attendance');
        }
     /*
	* author:xueyunhuan
	* 我的学员
	*  学员详细信息
     */
    public function mystudent(){
    	$model = D('Student');
    	$arr = $model->allstudent();
    	//print_r($arr);die;
    	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('count',$count);
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
    	$this->display('mystudent');
    }
     /*
	 * author:xueyunhuan
	 *查询详细信息
     */
     public function studentinfo(){
     	$stu_id = $_GET['stu_id'];
     	$model = D('Student');
     	$arr = $model->studentinfo($stu_id);
     	$progress = D('Progress');
       	$progress = $progress->stushow($stu_id);
     	$this->assign('arr',$arr);
     	$this->assign('progress',$progress);
     	$this->display('studentinfo');
     }
	 
	 /**
	 *	封装 教练的评价级别
	 */
	 public function coachreward($reward){
		 //判断总分，给出满意级别
			if($reward>16){
					return "非常满意";
				}else if($reward>12){
					return "满意";
				}else if($reward>8){
					return "一般";
				}else if($reward>4){
					return "差";
				}else{
					return "很差";
				}
	 }
}