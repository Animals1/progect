<?php
/*
 *@author:hanqiming
 *@date  :2016-4-14
 *@tablename:支出明细
 * */
namespace Home\Model;
use Think\Model;
class ExpenseModel extends Model {
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * hanqiming
     * */
    public function getvalue()
    {
        $User = M('expense');
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list = $User->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->where('expense_id>0')->order('expense_id desc')->page($p.',5')->select();
        $count      = $User->where('expense_id>0')->count();
        $page       = new \Think\Page($count,5);
        $show       = $page->show();
        $data = array($list,$count,$show,$p);
        return $data;
    }


    /**
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
        $User = M("expense");
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list=$User->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->where($sql)->page($p,5)->select();
        $count = $User->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->where($sql)->count();
        $page       = new \Think\Page($count,5);
        $show       = $page->show();
        $arr = array($p,$list,$show,$count);
        return $arr;
    }


    /*
     * 添加数据 hanqiming
     * $_POST['staff_id']=$staff_id
     * $_POST['expense_time']=$time
     * $_POST['status_id']=$status_id
     * $_POST['expense_money']=$money
     * $_POST['expense_desc']=$desc
     * */
    public function addvalue()
    {
        $data['staff_id']=$_POST['staff_id'];
        $data['expense_time']=$_POST['expense_time'];
        $data['status_id']=$_POST['status_id'];
        $data['expense_money']=$_POST['expense_money'];
        $data['expense_desc']=$_POST['expense_desc'];
        return $this->Table('expense')->add($data);
    }

    /**
     * 支出（删除）
     */
    public function delvalue(){

        $id = $_GET['id'];

        return $this->where("expense_id = $id")->delete();
    }

    /**
     * 支出（查看）
     */
    public function selvalue(){

        $id = $_GET['id'];

        return $this->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->join("role on staff.role_id=role.role_id")->where("expense_id=$id")->find();
    }



    /**
     * 支出报表 hanqiming
     */
    public function findvalue(){
        $sql = "select expense.status_id,sum(expense_money),status_name from expense join expense_status on expense.status_id=expense_status.status_id group by expense.status_id";
        $arr = $this->query($sql);
        return $arr;
    }


    /**
     * 支出（添加）
     */
    public function addex(){
        return $this->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->select();
    }


    /**
     * 支出状态表
     */
    public function exstatus(){
        return $this->Table('expense_status')->select();
    }
}
?>