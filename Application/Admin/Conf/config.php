<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(
        '__PUBLICA__' => __ROOT__.'/Application/Admin/Public'
    ),    
    'TMPL_L_DELIM' => '{{',
    'TMPL_R_DELIM' => '}}',
    '__FILE__' => __ROOT__.'/index.php/',
    'SESSION_AUTO_START' =>true,
);