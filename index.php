<?php
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

//获取应用目录
define('ROOT_PATH',str_replace('\\','/',dirname(__FILE__)) . '/');
define('HTTPHOST', $_SERVER['HTTP_HOST']);
//绑定Admin模块到当前入口文件
// define('BIND_MODULE', 'Home');

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require ROOT_PATH.'system/core/ThinkPHP.php';

