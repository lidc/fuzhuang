<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
        '__PUBLICA__' => __ROOT__.'/Application/Admin/Public',
	    '__UPLOAD_URL__'   => $_SERVER['HTTP_HOST'].__ROOT__.'/Application/Admin/Public/Uploads/',
        '__UPLOAD_PATH__'  => 'E:/WWW'.__ROOT__.'/Application/Admin/Public/Uploads/',
    ),
    
    'TMPL_L_DELIM' => '{{',
    'TMPL_R_DELIM' => '}}',
    '__FILE__' => __ROOT__.'/index.php/',
    'SESSION_AUTO_START' =>true,
	
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'fuzhuang',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
);


