<?php
/**
 * 用户注册
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 21:08
 */
class Domain_Register
{
    //验证用户名的唯一性
    public function checkRegister($user_name,$user_pwd)
    {
        //调用model层
        $rs=array();
        $model=new Model_Register();
        $rs = $model->checkRegister($user_name,$user_pwd);
        return $rs;
    }
}