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
        $list = $User->join('staff on expense.staff_id=staff.staff_id')->join('expense_status on expense.status_id=expense_status.status_id')->where('expense_id>0')->order('expense_id desc')->page($p.',3')->select();
        $count      = $User->where('expense_id>0')->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $data = array($list,$count,$show,$p);
        return $data;
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
        return $this->add($_POST);
    }

    /**
     * 支出报表 hanqiming
     */
    public function findvalue(){
        $sql = "select expense.status_id,sum(expense_money),status_name from expense join expense_status on expense.status_id=expense_status.status_id group by expense.status_id";
        $arr = $this->query($sql);
        return $arr;
    }
}
?>