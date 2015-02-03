<?php
namespace Home\Controller;
use Think\Controller;

class DesignController extends Controller {

	public function index(){
		$design = M('design');
		$design_category = M('design_category');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$cpid = isset($_GET['cpid']) ? intval($_GET['cpid']) : 0;
		$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
		
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$where = 1;
		if($id){
		    $where .= " AND status=1 ";
		    if($cpid){
		        $where .= " AND cpid=".$cpid." ";
		        $cpls = $design_category->field('id,c_title')->where("id=".$cpid."")->find();
		        $this->assign('cp_title',$cpls['c_title']);
		    }
		    if($cid){
		        $where .= " AND cid=".$cid." ";
		        $cpls = $design_category->field('id,c_title')->where("id=".$cid."")->find();
		        $this->assign('c_title',$cpls['c_title']);
		    }
		}
			
		$ls = $design->field('id,cpid,cid,design_title,add_time')->where($where)->select();
		$this->assign('ls',$ls);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
	
	public function detailed(){
	    $this->display();	    
	}
}