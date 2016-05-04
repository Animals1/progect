<?php
/**
 * APP注册接口的开发
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/3
 * Time: 21:02
 */
class Api_Register extends PhalApi_Api
{
    public function getRules() {
        return array(
            'index' => DI()->config->get('app.Register-index'),

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

    public function index()
    {
        //定义一个返回值
        $rs=array('code'=>0,'msg'=>'','info'=>array());
        //通过Domain来获取用户数据
        $domain=new Domain_Register();
        $info = $domain->checkRegister($this->user_name,$this->user_pwd);

        //日志记录
        $log=array($this->user_name,$this->user_pwd);
        //对数组进行判断
        if($info == false)
        {
            DI()->logger->debug('用户名已存在',$log);

            $rs['code'] = 0;
            $rs['msg'] = T('用户名已存在');
            return $rs;
        }

        //如果数据存在
        $rs['info']=$info;
        return $rs;
    }
}
