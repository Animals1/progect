<?php
/**
 * 分库分表的自定义数据库路由配置
 */

return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        'db_myproject' => array(                         //服务器标记
            'host'      => '123.56.248.127',             //数据库域名
            'name'      => 'app',               //数据库名字
            'user'      => 'meimei',                  //数据库用户名
            'password'  => 'root',	                    //数据库密码
            'port'      => '3306',                  //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ),
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        //通用路由
        '__default__' => array(
            'prefix' => '',
            'key' => 'user_id',
            'map' => array(
                array('db' => 'db_myproject'),
            ),
        ),

        /**
        'demo' => array(                                                //表名
            'prefix' => 'pa_',                                         //表名前缀
            'key' => 'id',                                              //表主键名
            'map' => array(                                             //表路由配置
                array('db' => 'db_myproject'),                               //单表配置：array('db' => 服务器标记)
                array('start' => 0, 'end' => 2, 'db' => 'db_myproject'),     //分表配置：array('start' => 开始下标, 'end' => 结束下标, 'db' => 服务器标记)
            ),
        ),
         */
    ),
);
