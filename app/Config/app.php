<?php
/**
 * 请在下面放置任何您需要的应用配置
 */

return array(

    /**
     * 用户信息显示条件
     */
    'User-info' => array(
        'userid' => array('name' => 'userid', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '用户ID'),
    ),
    'User-update' => array(
    	'userid' => array('name' => 'userid', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '用户ID'),
    	'usernickname' => array('name' => 'nickname' , 'type' => 'string' , 'min' => 1 , 'max' => 20 ,'require' => true,'desc' => '用户昵称'),
    	'usertel' => array('name' => 'tel' , 'type' => 'string' , 'min' => 11 , 'max' => 11 ,'require' => true,'desc' => '用户手机号'),
    	'usersex' => array('name' => 'sex' , 'type' => 'string' ,'require' => true,'desc' => '用户性别'),
    	'userarea' => array('name' => 'area' , 'type' => 'string' , 'min' => 2 , 'max' => 30 ,'require' => true,'desc' => '用户住址'),
    ),
	'Staff-info' => array( //教练信息显示条件
        'staffid' => array('name' => 'staffid', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '教练ID'),
    ),

);
