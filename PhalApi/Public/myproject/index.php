<?php
/**
 * Myproject 统一入口
 */

require_once dirname(__FILE__) . '/../init.php';

//装载你的接口
DI()->loader->addDirs('Myproject');

/** ---------------- 响应接口请求 ---------------- **/
//视图控制器 需要预设2个参数，第一个参数为该项目名称，第二个参数为视图类型(也就是你有多套模板使用哪一套)
DI()->view = new View_Lite('Myproject', 'Default');

$api = new PhalApi();
$rs = $api->response();
$rs->output();



