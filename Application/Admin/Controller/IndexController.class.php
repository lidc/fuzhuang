<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//         $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Admin模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $data = M('nav_page');
        $list = $data->select();
        $this->assign("vo",$list);
        $this->display('login');
    }
    public function login(){
    	$username = isset($_POST['username']) ? in($_POST['username']) : "";
    	$validatecode = isset($_POST['validatecode']) ? $_POST['validatecode'] : 0;  
    	$public  = new PublicController();  

    	if(!$public->check($validatecode)){
            $this->show("<script>alert('验证码错误，请重新输入！');javascript:history.go(-1);</script>");
            exit();           
        }
        
    	$this->assign("__FILE__",C('__FILE__'));
    	$this->display('index');
    }
}