<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/21
 * Time: 13:43
 */
class Api_Config extends PhalApi_Api
{
    public function getRules() {
        return array(
            'index'=> array(),
            'request' => array(
                'id'=>array('name'=>'uid','type'=>'int','require'=>true,'min'=>'1'),
                'name'=>array('name'=>'uname','type'=>'string','default'=>'这是QQ用户','format'=>'utf-8','min'=>6)
            ),
            'response'=> array(
                'ids'=>array('name'=>'uid','type'=>'int','require'=>true,'min'=>'1')
            )
        );
    }
    /*这是请求接口*/
    public function request()
    {
        throw new PhalApi_Exception_BadRequest('错误提示','1');
        return '这是请求接口'.$this->id.'用户名称'.$this->name;
    }
    /*这是返回信息接口*/
    public function response()
    {
        return "这是信息返回接口".$this->ids;
    }

    public function index()
    {
        //使用配置文件
        return    DI()->config->get('app.Config-index.userId.name');
        //使用日志
        //DI()->logger->log('info',200,DI()->config->get('app.Config-index'));
        DI()->logger->debug('这是调试信息');
        DI()->logger->info('这是业务信息，带更多场景信息', array('name' => 'dogstar'));
        DI()->logger->error('这是错误信息');

    }
}