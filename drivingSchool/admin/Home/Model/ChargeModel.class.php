<?php
/*
 *@author:hanqiming
 *@date  :2016-4-13
 *@tablename:收费明细表
 * */
namespace Home\Model;
use Think\Model;
class ChargeModel extends Model {
    /*
     * 查询数据 收费明细表、学员信息表、费用类型表、支付方式表，四表联查；
     *
     * */
    public function getvalue()
    {
        return $this->join('student on charge.stu_id=student.stu_id')->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->select();
    }
    /*
     * 收费明细-添加信息
     * 接受post的传值
     *  $_POST['stu_name']=$name;
     *  $_POST['stu_sn']=$sn;
     *  $_POST['payment_name']=$payment_name;
     *  $_POST['money_name']=$money_name;
     *  $_POST['charge_money']=$charge_money;
     * */
    public function addValue()
    {
        return $this->Table('charge')->add($_POST);
    }
    /*
     *我的学费——显示信息
     *收费明细表、学员信息表、费用类型表、支付方式表。
    */
    public function chargeshow(){
        $page=$_GET['page']?$_GET['page']:1;
            $page_size=3;
            $limit=($page-1)*$page_size;

            $num=$this->count();
            //echo $num;die;
            $yeshu=ceil($num/$page_size);
            //echo $yeshu;die;

            $data=$this->join('student on charge.stu_id=student.stu_id')->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->where('user_id = 2')->limit($limit,$page_size)->find();;
            $arr=array($yeshu,$data);
            return $arr;
    }
}
?>