<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/28
 * Time: 8:16
 */
class Domain_Login {
    //验证用户名或密码是否正确
    public function checkLogin($user_name,$user_pwd) {
        $rs = array();
        // 版本1：简单的获取   调用model层
        $model = new Model_Login();
        $rs = $model->checkLogin($user_name,$user_pwd);
        return $rs;
    }
}