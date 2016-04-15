<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:车辆更换表
 * */
namespace Home\Model;
use Think\Model;
class CarReplaceModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function selectValue($where=1,$order,$limit)
    {
        $select=$this->where($where)->order("$order")->limit($limit)->select();
        if($select)
        {
            return $select;
        }
        else
        {
            return false;
        }
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        $delect=$this->where($where)->delete();
        if($delect)
        {
            return $delect;
        }
        else
        {
            return false;
        }

    }

    /*
     * 换车记录添加
     *
     * */
    public function addCarreplace($data,$check)
    {
        if($check)
        {
            $repair=M('Car_repair');
            $this->add($data);
            return $repair->add($data);
        }
        else
        {
            return $this->add($data);
        }

    }

    /*
     * 搜索
     * */
    public function searchreplace($where=1)
    {
        $search=$this->where($where)->select();
        if($search)
        {
            return $search;
        }
        else
        {
            return false;
        }
    }
}
?>