<?php
namespace Home\Controller;
use Think\Controller;

class NewsController extends Controller {

    public function index(){
		$news = M('news');
		$news_category = M('news_category');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$cid = isset($_GET['cpid']) ? intval($_GET['cpid']) : 0;	
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$where = 1;
		if($id){
		    $where .= " AND status=1 ";
		    if($cid){
		        $where .= " AND cid=".$cid." ";
		        $cpls = $news_category->field('id,c_title,meta_title,meta_keywords,meta_description')->where("id=".$cid."")->find();
		        $this->assign('cpls',$cpls);
		    }
		}
			
		$ls = $news->field('id,cpid,cid,news_title,add_time')->where($where)->select();
		$this->assign('ls',$ls);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
	
	public function detailed(){
		$news = M('news');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$ls = $news->field('id,news_title,news_desc,news_content,big_img,add_time,meta_title,meta_keywords,meta_description')->where('id='.$id)->find();
		$ls['news_content'] = html_out($ls['news_content']);
		$this->assign('ls',$ls);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();	    
	}
}