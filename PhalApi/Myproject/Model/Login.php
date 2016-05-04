<?php
/**
 * 验证用户名或密码
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/28
 * Time: 9:25
 */

class Model_Login extends PhalApi_Model_NotORM {

    public function checkLogin($user_name,$user_pwd) {
        return DI()->notorm->user->select('*')->where('username', $user_name)->where('password',$user_pwd)->fetch();
    }

    protected function getTableName($id) {
        return 'user';
    }
}
