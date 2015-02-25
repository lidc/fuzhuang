<?php
namespace Home\Controller;
use Think\Controller;

class BrandController extends Controller {

	public function index(){
		$page = M('nav_page');
		$page_content = M('page_content');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$cpid = isset($_GET['cpid']) ? intval($_GET['cpid']) : 0;
		if($cpid){
		    $id = $cpid;
		}
		$ls = $page->field('nav_title,page_url,meta_title,meta_keywords,meta_description')->where("id=".$id."")->find();
		$lc = $page_content->field('content')->where('nav_id='.$id)->find();
		$content = html_out($lc['content']);
		$this->assign('ls',$ls);
		$this->assign('content',$content);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
}