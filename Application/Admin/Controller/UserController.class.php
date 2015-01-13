<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\KindEditor;
class UserController extends Controller {
		
    public function index(){  
        $where = 1;
        $userName = isset($_GET['userName'])?in($_GET['userName']):'';
        if(!empty($userName)){
            $where .= " AND username like '%".$userName."%' ";
        }
        $userAdmin = M('user_admin');
        $nowPage = isset($_GET['p'])?intval($_GET['p']):1;
        $numPerPage = 10;
        $count = $userAdmin->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $userAdmin->field('id,username,real_name,tel,mobile_phone,userIp,user_status,add_time')->where($where)->order('id asc')->page($nowPage.','.$Page->listRows)->select();
        $phone = '';
        $status = '';
        foreach ($list as $key=>$value){
        	if(!empty($value['tel'])){
        		$phone = $value['tel'];
        	}else{
        		$phone = $value['mobile_phone'];
        	}
        	if ($value['user_status']==0){
        		$status = '无效';
        	}else{
        		$status = '有效';
        	}
        	$list[$key]['status'] = $status;
        	$list[$key]['phone'] = $phone;
        	$list[$key]['add_time'] = date('Y-m-d H:i:s',$value['add_time']);
        }
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$list);        
        $this->assign("userName",$userName);
        $this->display();
    }
    
    public function edit(){
    	$userAdmin = M('user_admin');
    	if($_POST){
    		$uId = isset($_POST['uId']) ? intval($_POST['uId']) : 0;
    		$username = isset($_POST['username']) ? in($_POST['username']) : "";
    		$password = isset($_POST['password']) ? md5($_POST['password']) : "";
    		$confirm_password = isset($_POST['confirm_password']) ? md5($_POST['confirm_password']) : "";
    		$real_name = isset($_POST['real_name']) ? in($_POST['real_name']) : "";
    		$tel = isset($_POST['tel']) ? in($_POST['tel']) : "";
    		$mobile_phone = isset($_POST['mobile_phone']) ? in($_POST['mobile_phone']) : "";
    		$email = isset($_POST['email']) ? in($_POST['email']) : "";
    		$qq = isset($_POST['qq']) ? in($_POST['qq']) : "";
    		$address = isset($_POST['address']) ? in($_POST['address']) : "";
    		$user_status = isset($_POST['user_status']) ? intval($_POST['user_status']) : 0;    		
    		
    		$data = array(
    			'username' => $username,
    			'password' => $password,
    			'real_name' => $real_name,
    			'tel' => $tel,
    			'mobile_phone' => $mobile_phone,
    			'email' => $email,
    			'qq' => $qq,
    			'address' => $address,
    			'user_status' => $user_status    			
    		);
    		
    		if(empty($uId)){
    			echo "无参数，修改失败！";    			
    		}
    		
    		$result = $userAdmin->data($data)->where('id='.$uId)->save();
    		if($result){
    			echo "修改成功！";
    		}else{
    			echo "修改失败！";
    		}
    		
    		exit;
    	}
    	
    	
    	$uId = isset($_GET['uId']) ? intval($_GET['uId']) : "";
    	if(empty($uId)){    		
    		echo "无参数";
    		exit;
    	}
    	$list = $userAdmin->where('id='.$uId)->find();
    	$this->assign("ls",$list);
    	$this->display();
    }
    
    public function add(){
    	$userAdmin = M('user_admin');
    	if($_POST){
    		$uId = isset($_POST['uId']) ? intval($_POST['uId']) : 0;
    		$username = isset($_POST['username']) ? in($_POST['username']) : "";
    		$password = isset($_POST['password']) ? md5($_POST['password']) : "";
    		$confirm_password = isset($_POST['confirm_password']) ? md5($_POST['confirm_password']) : "";
    		$real_name = isset($_POST['real_name']) ? in($_POST['real_name']) : "";
    		$tel = isset($_POST['tel']) ? in($_POST['tel']) : "";
    		$mobile_phone = isset($_POST['mobile_phone']) ? in($_POST['mobile_phone']) : "";
    		$email = isset($_POST['email']) ? in($_POST['email']) : "";
    		$qq = isset($_POST['qq']) ? in($_POST['qq']) : "";
    		$address = isset($_POST['address']) ? in($_POST['address']) : "";
    		$user_status = isset($_POST['user_status']) ? intval($_POST['user_status']) : 0;
    		$data = array(
    				'username' => $username,
    				'password' => $password,
    				'real_name' => $real_name,
    				'tel' => $tel,
    				'mobile_phone' => $mobile_phone,
    				'email' => $email,
    				'qq' => $qq,
    				'address' => $address,
    				'user_status' => $user_status
    		);   	
    		
    		$result = $userAdmin->data($data)->add();
    		if($result){
    			echo "添加成功！";
    		}else{
    			echo "添加失败！";
    		}
    	
    		exit;
    	}
    	$KindEditor_obj = new KindEditor();
    	$editor_code = $KindEditor_obj->create_editor('textName',700,400);
    	$this->assign("editor",$editor_code);
    	$this->display();
    }
    
    public function delete(){
        
    }
    
}