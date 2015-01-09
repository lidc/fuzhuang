<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class UserController extends Controller {
    public function index(){  
        $where = 1;
        $userName = isset($_GET['userName'])?in($_GET['userName']):'';
        if(!empty($userName)){
            $where .= " AND username like '%".$userName."%' ";
        }
        $userAdmin = M('user_admin');
        $nowPage = isset($_GET['p'])?intval($_GET['p']):1;
        $numPerPage = 2;
        $count = $userAdmin->where('1')->count();
        $Page = new Page($count,$numPerPage);
        $list = $userAdmin->field('id,username,real_name,tel,mobile_phone,userIp,user_status,add_time')->where($where)->order('id asc')->page($nowPage.','.$Page->listRows)->select();
        $page_show = $Page->show();
        $this->assign("list",$list);
        $this->assign("page_show",$page_show);
        $this->assign("userName",$userName);
        $this->display();
    }
}