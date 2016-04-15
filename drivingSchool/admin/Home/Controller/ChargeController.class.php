<?php
/**
 *@教练模块----个人中心
 */
namespace Home\Controller;
use Think\Controller;
class ChargeController extends Controller {

    /**
     * 测试
     */
    public function index(){

        $arr = D('salary');

        $re = $arr->getvalue();
        print_r($re);
    }
}