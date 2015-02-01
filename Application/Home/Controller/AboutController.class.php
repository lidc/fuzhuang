<?php
namespace Home\Controller;
use Think\Controller;

class AboutController extends Controller {
	
	public function index(){
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
}