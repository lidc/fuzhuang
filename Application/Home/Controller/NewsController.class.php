<?php
namespace Home\Controller;
use Think\Controller;

class NewsController extends Controller {

	public function index(){
		$design = M('design');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$where = " cpid=".$id." OR cid=".$id." ";
		$ls = $design->field('id,cpid,cid,design_title,add_time')->where($where)->select();
		$this->assign('ls',$ls);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
}