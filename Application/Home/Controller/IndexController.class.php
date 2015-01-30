<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        
    	$this->assign("menu",menu());
    	$this->assign('banner',banner());
        $this->display();
        
    }
}