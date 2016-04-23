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
     */
    public function getvalue(){

        $User = M("arrears");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where('arrears_id>0')->order('arrears_id desc')->page($p,5)->select();
        $count = $User->where('arrears_id>0')->count();
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
        $User = M("arrears");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where($sql)->order('arrears_id desc')->page($p,5)->select();
        $count = $User->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where($sql)->order('arrears_id desc')->count();
        $page       = new \Think\Page($count,5);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
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
     *@author:hanqiming
     *@date  :2016-4-19
     *@tablename:查看
     */
    public function selvalue(){
        $id = $_GET['id'];

        return $this->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where("arrears_id=$id")->find();
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