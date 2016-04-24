<?php
/*
 * @author:yaobowen
 * @date  :2016-4-15
 * @tablename:车辆更换表
 * */
namespace Home\Model;
use Think\Model;
class CarReplaceModel extends Model {
    /**
     * 	查询相对教练的换车记录数据
     */
    public function getValue($where)
    {
        $count      = $this->where($where)->count();
		// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,2);
		// print_r($Page);die;
		// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $this->where($where)
					->limit($Page->firstRow.','.$Page->listRows)
					->join("coach ON car_replace.replace_name = coach.coach_id")
					->join("staff ON coach_staff_id = staff.staff_id")
					->join("car ON car_replace.replace_number_before = car.car_id")
					->field('car.car_id,car.car_number,car_replace.*,staff.*')
					->select();
		$arr = array($show,$list);
		return $arr;
		
    }
	/**
	*	查寻更换后的车牌号
	*/
	public function getlastnu($last_id){
		return $this->where("replace_number_after = '$last_id'")
					->join("car ON car_replace.replace_number_after = car.car_id")->find();
	}
    /*
     * 删除一条数据
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }

    /*
     * 换车记录添加
     *
     * */
    public function addCarreplace($data)
    {
        return $this->add($data);
    }

    /*
     * 车辆更换查询
     * 连接员工表查询更换人名称 coach  staff
     * 连接车辆登记表查询车牌号码    car
     * */
    public function selectReplace($where=1)
    {
        $before=$this->join('coach on car_replace.replace_name=coach.coach_id')->join('staff on coach.coach_staff_id=staff.staff_id')->join('car on car_replace.replace_number_before=car.car_id')->where($where)->select();

        $after=$this->join('coach on car_replace.replace_name=coach.coach_id')->join('staff on coach.coach_staff_id=staff.staff_id')->join('car on car_replace.replace_number_after=car.car_id')->where($where)->select();
        foreach($before as $key=>$val)
        {
            foreach($after as $k=>$v)
            {
                $before[$key]['after_number']=$after[$key]['car_number'];
            }
        }
        return $before;
    }
	
	/*
     * 查询一条换车记录
     *
     * */
    public function getoneValue($where)
    {
        return $this->where($where)
					->join("coach ON car_replace.replace_name = coach.coach_id")
					->join("staff ON coach_staff_id = staff.staff_id")
					->join("car ON car_replace.replace_number_before = car.car_id")
					->field('car.car_id,car.car_number,car_replace.*,staff.*,coach.*')
					->find();
    }
	
}
?>