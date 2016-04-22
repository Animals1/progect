<?php
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:车辆更换表
 * */
namespace Home\Model;
use Think\Model;
class CoachModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where,$order,$limit)
    {
        return $this->select();
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
    *教练信息
    * */
    public function coachMessage($where=1)
    {
        return $this->join('staff on coach.coach_staff_id=staff.staff_id')->join('sex on staff.staff_sex=sex.sex_id')->join('coach_group on coach.group_id=coach_group.group_id','LEFT')->where($where)->select();
    }

    public function nogroupcoachMessage($where=1)
    {
        return $this->join('staff on coach.coach_staff_id=staff.staff_id')->join('sex on staff.staff_sex=sex.sex_id')->where($where)->select();
    }
    /*
     * 修改
     * */
    public function UpdateCoachGropuId($data)
    {
        foreach($data as $key=>$coachName)
        {
            $where="staff.staff_name like '%$coachName[staffname]%'";
            $staff_id[]=$this->join('staff on coach.coach_staff_id=staff.staff_id')->join('sex on staff.staff_sex=sex.sex_id')->where($where)->field('staff_id')->select();
        }

        foreach($staff_id as $k=>$val)
        {
            $group_id[]=$val[0];
        }
        foreach($group_id as $kk=>$vv)
        {
            $id[]=$vv['staff_id'];
        }
        $ids=implode(',',$id);
        $arr=array_column($data,'parent_id');
        $group['group_id']=$arr[0];
        $sql="update coach set group_id='$arr[0]' where coach_staff_id in ($ids)";
       return $this->execute($sql);
    }

    public function selectgroup($where=1)
    {
        $group=M('coach_group');
        return $group->where($where)->select();
    }
    /*
     * 新增分组
     * 表单里用复选框遍历出来没有分组的每个人
     * */
    public function addGroup($data)
    {
        return $this->add($data);
    }

    /*查询所有组名*/
    public function groupName()
    {
        $group_name=M('CoachGroup');
        return $group_name->select();
    }
    /*
     * author:xueyunhuan
    * j查询教练姓名
     * 
     * 
    * */
    public function coachinfo($where=1)
    {
        return $this->join("staff on staff.staff_id = coach.coach_staff_id")->field("staff_name,coach_id")->select();
    }
}
?>