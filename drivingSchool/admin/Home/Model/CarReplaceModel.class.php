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
    public function getValue($name)
    {
        $count      = $this->where("replace_name = '$name'")->count();
		// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,2);
		// print_r($Page);die;
		// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $this->where("replace_name = '$name'")
					->limit($Page->firstRow.','.$Page->listRows)
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
    public function addCarreplace($data)
    {
        return $this->add($data);
    }
	
	/*
     * 查询一条换车记录
     *
     * */
    public function getoneValue($id)
    {
        return $this->where("replace_id = '$id'")->find();
    }
	
}
?>