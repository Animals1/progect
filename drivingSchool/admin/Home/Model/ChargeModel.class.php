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
    */
    public function getvalue(){

        $User = M("charge");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('student on charge.stu_id=student.stu_id')->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->page($p,5)->select();
        $count = $User->count();
        $page       = new \Think\Page($count,5);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }



    /*
     * 多添件搜索
     */
    public function searchs(){

        $arr = I('post.');

        foreach ($arr as $k => $v) {
            if ($v=='') {
                unset($arr[$k]);
            }
        }
        $sql='';
        $i=0;
        foreach ($arr as $k => $v) {
            if($i!=0){
                $sql.=' and ';
            }
            $sql.="$k like '%$v%'";
            $i++;
        }
        if($sql){
            cookie("sql",$sql);
        }else{
            $sql = cookie('sql');
        }
        $User = M("charge");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('student on charge.stu_id=student.stu_id')->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->where($sql)->order('charge_id desc')->page($p,5)->select();
        $count = $User->join('student on charge.stu_id=student.stu_id')->where($sql)->order('charge_id desc')->count();
        $page       = new \Think\Page($count,5);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
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
        $date['stu_id'] = $_POST['stu_id'];
        $date['money_type_id'] = $_POST['money_type_id'];
        $date['charge_time'] = $_POST['charge_time'];
        $date['payment_id'] = $_POST['payment_id'];
        $date['charge_money'] = $_POST['charge_money'];
        return $this->Table('charge')->add($date);
    }

    /**
     *@author:hanqiming
     *@date  :2016-4-18
     *@tablename:删除
     */
    public function delvalue(){

        $id = $_GET['id'];

        return $this->where("charge_id=$id")->delete();
    }


    /**
     *@author:hanqiming
     *@date  :2016-4-19
     *@tablename:查看
     */
    public function selvalue(){
        $id = $_GET['id'];
        return $this->join('student on charge.stu_id=student.stu_id')->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->where("charge_id=$id")->find();
    }

    /*
     *我的学费——显示信息(xueyunhuan)
     *收费明细表、学员信息表、费用类型表、支付方式表。
    */
    public function chargeshow(){
            $user_id = $_COOKIE['userid'];
            isset($_GET['p'])?$p=$_GET['p']:$p=1;
            $list =$this->join('money_type on charge.money_type_id=money_type.money_type_id')->join('payment_method on charge.payment_id=payment_method.payment_id')->where("charge.stu_id = $user_id")->page($p,2)->select();
            $count      = $this->where("stu_id = $user_id")->count();
            $page       = new \Think\Page($count,2);
            $show       = $page->show();
            $arr = array($p,$list,$show,$count);
            return $arr;
    }

    /**
     * 收入报表（hanqiming）
     */
    public function findvalue(){
        $sql="select charge.money_type_id,sum(charge_money),money_name from charge join money_type on charge.money_type_id=money_type.money_type_id group by charge.money_type_id";
        $arr = $this->query($sql);
        return $arr;
    }
}
?>

