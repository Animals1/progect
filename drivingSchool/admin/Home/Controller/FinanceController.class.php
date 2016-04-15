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
     * 收费明细
     */
    public function charge(){

        $arr = D('expense');

        $re = $arr->findvalue();
        $this->assign('re',$re);
        $this->display('charge');
    }


    /**
     * 支出明细
     */
    public function arrears(){
        $this->display('arrears');
    }


    /**
     * 工资明细
     */
    public function salary(){
        $this->display('salary');
    }
}