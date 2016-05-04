<?php
/**
 * 用户登录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 8:24
 */

class Api_Login extends PhalApi_Api
{
    public function getRules() {
        return array(
            'login' => DI()->config->get('app.Login-login'),

        );
    }

    /**
     * 获取用户基本信息
     * @desc 用于获取单个用户基本信息
     * @return int code 操作码，0表示成功，1表示用户不存在
     * @return object info 用户信息对象
     * @return int info.id 用户ID
     * @return string info.name 用户名字
     * @return string info.note 用户来源
     * @return string msg 提示信息
     */
    public function login()
    {
        //定义了一个返回值
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        //通过domain来获取用户数据
        $domain = new Domain_Login();

        $info = $domain->checkLogin($this->user_name,$this->user_pwd);
        //对获取到的数组进行判断
        $log=array($this->user_name,$this->user_pwd );
        if (empty($info)) {
            DI()->logger->debug('用户或密码不存在',$log);

            $rs['code'] = 0;
            $rs['msg'] = T('user not exists');
            return $rs;
        }
        //如果拿到了数据就进行信息返回
        $rs['info'] = $info;

        return $rs;
    }


}