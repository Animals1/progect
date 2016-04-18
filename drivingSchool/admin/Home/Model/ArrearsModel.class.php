<?php
/*
 * @author:hanqiming
 * @date  :2016-4-14
 * @tablename:欠费明细表
 * */
namespace Home\Model;
use Think\Model;
class ArrearsModel extends Model {

    /*
     * 查询数据 欠费明细表、学员信息表、费用类型表、支付方式表，四表联查；
     *
     * */
    public function getvalue()
    {
        $User = M('arrears'); // 实例化User对象
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list = $User->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where('arrears_id>0')->order('arrears_id desc')-> page($p.',3')->select();
        $count      = $User->where('arrears_id>0')->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $data = array($list,$count,$show,$p);
        return $data;
    }


    /**
     * @author:hanqiming
     * @date  :2016-4-18
     * @tablename:删除
     */
    public function delvalue(){

        $id = $_GET['id'];

        return $this->where("arrears_id=$id")->delete();
    }


    /*
     * @author:hanqiming
     * @date  :2016-4-18
     * @tablename:删除
     * 接受post的传值
     *  $_POST['stu_name']=$name;
     *  $_POST['stu_sn']=$sn;
     *  $_POST['payment_name']=$payment_name;
     *  $_POST['money_name']=$money_name;
     *  $_POST['charge_money']=$charge_money;
     * */
    public function addValue()
    {
        $date['stu_id'] = $_POST['stu_id'];
        $date['stu_sn'] = $_POST['stu_sn'];
        $date['money_type_id'] = $_POST['money_type_id'];
        $date['arrears_time'] = $_POST['arrears_time'];
        $date['status_id'] = $_POST['status_id'];
        $date['arrears_money'] = $_POST['arrears_money'];
        return $this->Table('arrears')->add($date);
    }



    /**
     * 收入报表（hanqiming）
     */
    public function findvalue(){
        $sql="select sum(arrears_money),money_name from arrears join money_type on arrears.money_type_id=money_type.money_type_id ";
        $arr = $this->query($sql);
        return $arr;
    }
}