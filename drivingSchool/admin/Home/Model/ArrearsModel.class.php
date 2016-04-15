<?php
/*
 * @author:hanqiming
 * @date  :2016-4-14
 * @tablename:欠费明细表
 * */
namespace Home\Model;
use Think\Model;
class ArrearsTypeModel extends Model {

    /*
     * 查询数据 欠费明细表、学员信息表、费用类型表、支付方式表，四表联查；
     *
     * */
    public function getvalue()
    {
        $page=$_GET['page']?$_GET['page']:1;
        $page_size=3;
        $limit=($page-1)*$page_size;

        $num=$this->count();
        $page_list=ceil($num/$page_size);
        $re = $this->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->select();
        $arr = array($page_list,$re);
        return $arr;
    }
}