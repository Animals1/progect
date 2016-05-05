<?php
/**
 * 用户注册  model_register
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 21:15
 */

class Model_Register extends PhalApi_Model_NotORM {

    public function checkRegister($user_name,$user_pwd) {
        $insert=array(
            'user_name'=>$user_name,
            'user_pwd'=>$user_pwd,
        );
        $user_name=DI()->notorm->app_user->select('*')->where('user_name', $user_name)->fetch();
        if(!$user_name)
        {
            if(!$user_pwd)
            {
                return "密码不能为空";
            }else
            {
                DI()->notorm->app_user->insert($insert);
                return "注册成功";
            }
        }else
        {
            return "用户名已存在";
        }
    }

    protected function getTableName($id) {
        return 'app_user';
    }
}