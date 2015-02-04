<?php
namespace Home\Controller;
use Think\Controller;

class ProductController extends Controller {
	
    public function index(){
		$product = M('product');
		$product_category = M('product_category');
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
		        $where .= " AND (cpid=".$cpid." or cid=".$cpid.") ";
		        $cpls = $product_category->field('id,c_title,meta_title,meta_keywords,meta_description')->where("id=".$cpid."")->find();
		        $this->assign('cp_title',$cpls['c_title']);
		    }
		    if($cid){
		        $where .= " AND cid=".$cid." ";
		        $cpls = $product_category->field('id,c_title,meta_title,meta_keywords,meta_description')->where("id=".$cid."")->find();
		        $this->assign('c_title',$cpls['c_title']);
		    }
		}

		$ls = $product->field('id,cpid,cid,product_title,small_img,big_img,add_time')->where($where)->select();
		$this->assign('ls',$ls);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();
	}
	
	public function detailed(){
		$product = M('product');
		$product_category = M('product_category');
		$product_content = M('product_content');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$cpid = isset($_GET['cpid']) ? intval($_GET['cpid']) : 0;
		$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
		if(!$id){
			echo  "无参数！";
			exit;
		}
		$ls = $product->field('id,cid,cpid,product_title,big_img,add_time,meta_title,meta_keywords,meta_description')->where('id='.$id)->find();
		$lsc = $product_content->field('id,content1')->where('product_id='.$id)->find();
		$lsc['content1'] = html_out($lsc['content1']);
		$this->assign('ls',$ls);
		$this->assign('lsc',$lsc);
		$this->assign("menu",menu());
		$this->assign('banner',banner());
		$this->display();	    
	}
}