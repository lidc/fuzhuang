<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$public = new PublicController();
    	$public->nav();
    	$public->bottom();
        $this->display();
        
    }
}