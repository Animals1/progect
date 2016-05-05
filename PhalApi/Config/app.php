<?php
/**
 * 请在下面放置任何您需要的应用配置
 */

return array(

    /**
     * 应用接口层的统一参数
     */
    'Config-index' => array(
    'userId' => array('name' => 'user_id', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '用户ID'),
    ),
    'Login-login' => array(
        'user_name' => array('name' => 'username', 'type' => 'string', 'min' => 1, 'require' => true, 'desc' => '用户账号'),
        'user_pwd' => array('name' => 'password', 'type' => 'string', 'min' => 1, 'require' => true, 'desc' => '用户密码'),
    ),
    //用户注册
    'Register-index' => array(
        'user_name' => array('name' => 'user_name', 'type' => 'string', 'min' => 1, 'require' => true, 'desc' => '用户账号'),
        'user_pwd' => array('name' => 'user_pwd', 'type' => 'string', 'min' => 1, 'desc' => '用户密码'),
    ),

);
