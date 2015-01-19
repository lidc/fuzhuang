<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
        '__PUBLICA__'           => __ROOT__.'/Application/Admin/Public',                    //后台公共资源Public路径
	    '__PUBLIC_FONT__'       => ROOT_PATH.'Application/Admin/Public/font/',              //字体根目录
	    '__UPLOAD_URL__'        => __ROOT__.'/Application/Admin/Public/Uploads/',           //后台图片访问路径   $_SERVER['HTTP_HOST'].
        '__UPLOAD_PATH__'       => ROOT_PATH.'Application/Admin/Public/Uploads/',           //后台图片保存路径
        '__FILE__UPLOADS__'     => ROOT_PATH.'public/uploads/',                             //文件上传目录                        
	    '__FILE_UPLOADS_URL__'  => __ROOT__.'/public/uploads/',                             //文件上传访问路径
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


