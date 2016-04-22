<?php
/*
 *@author:hechengwei
 *@date  :2016-4-13
 *@tablename:教练分组
 * */
namespace Home\Model;
use Think\Model;
class CoachGroupModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue()
    {
        $res=$this->select();
       return $this->tree($res,$parent_id=0);
    }

    /*递归*/
    public function tree($res,$pid)
    {
        $child=array();
        foreach ($res as $key => $value)
        {
            if($value['parent_id']==$pid)
            {
                $child[]=$value;
            }
        }
        //child 为空
        if(empty($child))
        {
            return null;
        }
        foreach ($child as $k =>$v)
        {

            $three_child=$this->tree($res,$v['group_id']);
            if($three_child)
            {
                $child[$k]['child']=$three_child;
            }
        }

        return $child;
    }

        public function addchild($data)
        {
            foreach($data[1] as $k=>$v)
            {
                $coach=M('Staff');
                for($i=0;$i<count($v);$i++)
                {
                    $coach_tel=$coach->where("staff_name like '$v'")->field('staff_tel')->select();
                    foreach($coach_tel as $key=>$tel)
                    {
                        $arr[]=array('parent_id'=>$data[0],'staffname'=>$v,'phone'=>$tel['staff_tel']);
                    }

                }
            }
            return $this->addAll($arr);
        }

    /*
     * 添加
     * */
        public function addgroup($data)
        {
            return $this->add($data);
        }

    /*
     *
     * */
        public function selectgroup($where)
        {
           return $this->where($where)->find();
        }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function deletegroup($where)
    {
        return $this->where($where)->delete();
    }

}
?>