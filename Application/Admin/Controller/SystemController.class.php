<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller {
    public function index(){    	
    	$current_time = date('Y-m-d H:i:s');
    	$sys_php_uname = php_uname();	//获取系统类型及版本号
    	$sys_php_sapi_name = php_sapi_name();	//获取PHP运行方式
    	$sys_php_version = PHP_VERSION;		//获取PHP版本
    	$sys_http_host = $_SERVER["HTTP_HOST"];			//获取Http请求中Host值
    	$sys_server_name = GetHostByName($_SERVER['SERVER_NAME']);		//获取服务器IP
    	$sys_http_accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];				//获取服务器语言
    	$sys_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
    	$sysArr = array('current_time' => $current_time , 'sys_php_uname' => $sys_php_uname,'sys_php_sapi_name'=>$sys_php_sapi_name,'sys_php_version'=>$sys_php_version,'sys_http_host'=>$sys_http_host,'sys_server_name'=>$sys_server_name,'sys_http_accept_language'=>$sys_http_accept_language,'sys_http_user_agent'=>$sys_http_user_agent);
    	$this->assign('sysArr',$sysArr);    	
        $this->display();
    }
}