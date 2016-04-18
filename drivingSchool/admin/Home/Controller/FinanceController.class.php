<?php
/*
 *@author:hanqiming
 *@date  :2016-4-15
 *@财务模块
 * */
namespace Home\Controller;
use Think\Controller;
class FinanceController extends Controller {

    /**
     * 收费明细（显示列表）
     */
    public function charge(){

        $arr = D('charge');

        $re = $arr->getvalue();
//        print_r($re);die;
        $list = $re['0'];
        $count = $re['1'];
        $page = $re['2'];
        $p = $re[3];

        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('p',$p);
        $this->display('charge');
    }


    /**
     * 收费明细（收费）
     */
    public function addcharge(){

        $student = D('student');

        $name = $student->allvalue();

        $money = D('money_type');

        $type = $money->getvalue();

        $payment = D('payment_method');

        $method = $payment->getvalue();

        $this->assign('name',$name);
        $this->assign('type',$type);
        $this->assign('method',$method);
        $this->display('addcharge');
    }


    /**
     * 收费明细（判断添加数据是否成功）
     */
    public function doadd(){

        $arr = D('charge');

        $add = $arr->addValue();

        if($arr){
            $this->success('收费成功',U('Finance/charge'));
        }else{
            $this->error('收费失败');
        }
    }


    /**
     * 收费明细（删除）
     */
    public function delcharge(){

        $arr = D('charge');

        $del = $arr->delvalue();
        if($del){
            $this->success('删除成功',U('Finance/charge'));
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 支出明细
     */
    public function arrears(){

        $arr = D('arrears');

        $re = $arr->getvalue();
        $list = $re['0'];
        $count = $re['1'];
        $page = $re['2'];
        $p = $re['3'];

        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('p',$p);

        $this->display('arrears');
    }


    /**
     * 支出明细（添加）
     */
    public function addarrears(){

        $student = D('student');

        $name = $student->allvalue();

        $money = D('money_type');

        $type = $money->getvalue();

        $status = D('status');

        $statu = $status->getvalue();
        $this->assign('name',$name);
        $this->assign('type',$type);
        $this->assign('statu',$statu);

        $this->display('addarrears');
    }


    /**
     * 欠费明细（判断添加数据是否成功）
     */
    public function doadds(){

        $arr = D('arrears');

        $add = $arr->addValue();

        if($arr){
            $this->success('添加成功',U('Finance/arrears'));
        }else{
            $this->error('添加失败');
        }
    }


    /**
     * 支出明细（删除）
     */
    public function delarrears(){

        $arr = D('arrears');

        $del = $arr->delvalue();
        if($del){
            $this->success('删除成功',U('Finance/arrears'));
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 工资明细
     */
    public function salary(){

        $arr = D('salary');

        $re = $arr->getvalue();
        $list = $re['0'];
        $count = $re['1'];
        $page = $re['2'];
        $p = $re['3'];

        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('p',$p);

        $this->display('salary');
    }


    /**
     * 支付明细
     */
    public function expense(){

        $arr = D('expense');

        $re = $arr->getvalue();
        $list = $re['0'];
        $count = $re['1'];
        $page = $re['2'];
        $p = $re['3'];

        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('p',$p);

        $this->display('expense');
    }



    /**
     * 收入报表
     */
    public function income(){

        $arr = D('charge');

        $re = $arr->findvalue();

        $row = D('arrears');

        $all = $row->findvalue();


        $money = $re[0]['sum(charge_money)'];
        $money1 = $re[1]['sum(charge_money)'];
        $money2 = $re[2]['sum(charge_money)'];
        $money3 = $all[0]['sum(arrears_money)'];
        $this->assign('money',$money);
        $this->assign('money1',$money1);
        $this->assign('money2',$money2);
        $this->assign('money3',$money3);
        $this->display('income');
    }



    /**
     * 支出报表
     */
    public function expenditure(){

        $arr = D('expense');

        $re = $arr->findvalue();

        $name = $re[0]['status_name'];
        $money = $re[0]['sum(expense_money)'];
        $name1 = $re[1]['status_name'];
        $money1 = $re[1]['sum(expense_money)'];
        $name2 = $re[2]['status_name'];
        $money2 = $re[2]['sum(expense_money)'];
        $name3 = $re[3]['status_name'];
        $money3 = $re[3]['sum(expense_money)'];
        $name4 = $re[4]['status_name'];
        $money4 = $re[4]['sum(expense_money)'];
        $name5 = $re[5]['status_name'];
        $money5 = $re[5]['sum(expense_money)'];

        $this->assign('name',$name);
        $this->assign('money',$money);
        $this->assign('name1',$name1);
        $this->assign('money1',$money1);
        $this->assign('name2',$name2);
        $this->assign('money2',$money2);
        $this->assign('name3',$name3);
        $this->assign('money3',$money3);
        $this->assign('name4',$name4);
        $this->assign('money4',$money4);
        $this->assign('name5',$name5);
        $this->assign('money5',$money5);
        $this->display('expenditure');
    }
}