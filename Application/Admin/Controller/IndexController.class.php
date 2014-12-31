<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $username = isset($_SESSION['fuzhuang']['username']) ? $_SESSION['fuzhuang']['username'] : "";
        if(!empty($username)){
            $this->display('index');
        }else{
            $this->display('login');    
        }        
    }
    public function login(){
        if($_POST){
        	$username = isset($_POST['username']) ? in($_POST['username']) : "";
            $password = isset($_POST['userpwd']) ? md5($_POST['userpwd']) : "";
        	$validatecode = isset($_POST['validatecode']) ? $_POST['validatecode'] : 0;  
        	$public  = new PublicController();  
        	if(!$public->check($validatecode)){
                $this->show("<script>alert('验证码错误，请重新输入！');javascript:history.go(-1);</script>");    
                exit;      
            }
            $this->assign("__FILE__",C('__FILE__'));
            $data = M('user_admin');
            $list = $data->field('password')->where("username='".$username."'")->find();

            if($list['password']!=$password){
                $this->show("<script>alert('用户名或密码有误，请重新输入！');javascript:history.go(-1);</script>");    
                exit;  
            }else{
                $_SESSION['fuzhuang']['username'] = $username;
                $this->display('index');
            }
        }   	
    }
}