<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:班车表
 * */
namespace Home\Model;
use Think\Model;
class BusModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where)
    {
        $User = M("Bus");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->where($where)->page($p,2)->select();
        $count = $User->where($where)->count();
        $page       = new \Think\Page($count,2);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }
    /*
     * 修改
     * */
    public function updateBus($id,$data)
    {
        $msg=$this->where($id)->save($data);
    }
    /*
     * 班车时刻表
     * 根据路线id分组查询路线
     * */
    public function busTimetable()
    {
        return $this->join('bus_record on bus.bus_id=bus_record.bus_id')->field('bus_route')->group('bus_id')->select();
    }
    /*
     * 添加班车
     * */
    public function addBus($data)
    {
        return $this->add($data);
    }

}
?>