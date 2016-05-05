<?php
/**
 * $APP_NAME 统一入口
 */

require_once dirname(__FILE__) . '/init.php';

//装载你的接口
<<<<<<< HEAD
DI()->loader->addDirs('project');
=======
DI()->loader->addDirs('Project');
DI()->loader->addDirs('Demo');
>>>>>>> f0eb67e4ab270d8c6459fc0a292a8fcb47963a66

/** ---------------- 响应接口请求 ---------------- **/

$api = new PhalApi();
$rs = $api->response();
$rs->output();

