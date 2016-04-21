<?php
/**
	*@学员模块----个人中心(xueyunhuan)
	*/
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
	/*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 * 考证进度
	 *$p = 当前页码
	 *$list = 显示数据(当前用户信息)
	 *$page = 翻页
	*/
       public function index(){
       	$model = D('Student');
       	$arr = $model->getshow();
       	$progress = D('Progress');
       	$progress = $progress->getshow();
       	$this->assign('progress',$progress);
       	//print_r($arr);die;
       	$this->assign('arr',$arr);
       	$this->display('personinfo');
        }

      /*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(当前用户预约列表)
	 *$page = 翻页
	*/
       public function stuorder(){
       	$model = D('StuOrder');
       	$arr = $model->getshow();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('count',$count);
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->display('stuorder');
        }
 		/*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(我的学费---学费明细)
	 *$page = 翻页
	*/
       public function mycharge(){
       	$model = D('Charge');
       	$arr = $model->chargeshow();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	//print_r($page);die;
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->assign('count',$count);
       	$this->display('mycharge');
        }

       /*
	 * （xueyunhuan）
	 *调用stuorder中数据
	 *$p = 当前页码
	 *$list = 显示数据(当前用户已取消预约列表)
	 *$page = 翻页
	*/
       public function noorder(){
       	$model = D('StuOrder');
       	$arr = $model->noorder();
       	$p = $arr['0'];
       	$list = $arr['1'];
       	$page = $arr['2'];
       	$count = $arr['3'];
       	$this->assign('page',$page);
       	$this->assign('p',$p);
       	$this->assign('list',$list);
       	$this->assign('count',$count);
       	//print_r($list);die;
       	$this->display('noorder');
        }
        /*
	 * （xueyunhuan）
	 *预约申请
	 *$arr[教练姓名，id]
	 *$arr[教练姓名，id]
	*/
        public function applyorder(){
        	$model = D('Coach');
        	$arr = $model->coachinfo();
        	$class = D('Class');
        	$class_name = $class->getvalue();
        	$time = D('TimeTable');
        	$time_table = $time->getvalue();
        	//print_r($time_table);die;
			    $this->assign('staff_name',$arr);
			    $this->assign('time_table',$time_table);
			    $this->assign('class_name',$class_name);
        	$this->display('applyorder');
        }
      /*
	 * （xueyunhuan）
	 *查询时间段是否有预约
	*/
        public function select_order(){

        	$model = D('StuOrder');
        	$arr = $model->time_table();
        	if ($arr==null) {
        		echo "1";
        	}else{
        		echo "0";
        	}
        }
      /*
	 * （xueyunhuan）
	 *添加预约
	 *$arr[教练姓名，id]
	 *$arr[教练姓名，id]
	*/
        public function add_order(){
        	$model = D('StuOrder');
        	$arr = $model->getadd();
        	if ($arr) {
        		$this->success('预约成功',U("Student/applyorder"));
        	}else{
        		$this->success('预约失败',U("Student/applyorder"));
        	}
        }
      /*
	 * （xueyunhuan）
	 *科1考题(考试人信息)
	 */
      public function one(){
        $model = D('Student');
        $arr = $model->getshow();
        $this->assign('arr',$arr);
      	$this->display('ke1');
      }
}