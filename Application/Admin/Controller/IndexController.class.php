<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
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