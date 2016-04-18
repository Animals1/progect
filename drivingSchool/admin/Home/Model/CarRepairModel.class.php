<?php
/*
 * @author:yaobowen
 * @date  :2016-4-15
 * @tablename:汽车维修表
 * */
namespace Home\Model;
use Think\Model;
class CarRepairModel extends Model {
    /**
     * 查询数据
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
					->join('repair_status on car_repair.repair_statusid=repair_status.repair_statusid')
					->join('car on car_repair.repair_carid=car.car_id')
					->select();
		$arr = array($show,$list);
		return $arr;
		
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
    public function addCarrepair($data)
    {
		return $this->add($data);
    }

    

    
}
?>