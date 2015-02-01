<?php
namespace Home\Controller;
use Think\Controller;

class ContactController extends Controller {

	public function index(){
		$page = M('nav_page');
		$page_content = M('page_content');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// 		echo  $id;
		if(!$id){
			echo  "无参数！";
			exit;
		}		
// 		$list = $page->field('id,pid,nav_title,page_url,')->where('id='.$id)->find();
		$lc = $page_content->field('content')->where('nav_id='.$id)->find();
// 		print_r($lc);
		$content = html_out($lc['content']);
		
		$this->assign('content',$content);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
}