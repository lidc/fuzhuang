<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$design = M('design');
    	$brand = M('brand');
        $news = M('news');
        $product = M('product');
    	
    	$dlist = $design->field('id,design_title,big_img,hotOffers')->where('hotOffers=1 or hotOffers=2')->order('add_time desc')->select();
    	$blist = $brand->field('id,brand_name,big_img,hotOffers')->where('hotOffers=1 or hotOffers=2')->order('add_time desc')->select();
        $nlist = $news->field('id,news_title,big_img,hotOffers')->where('cid=3 and (hotOffers=1 or hotOffers=2)')->order('add_time desc')->select();
        $plist = $product->field('id,product_title,big_img,hotOffers')->where('hotOffers=1')->order('add_time desc')->select();

    	$this->assign("dlist",$dlist);
    	$this->assign("blist",$blist);
        $this->assign('nlist',$nlist);
        $this->assign('plist',$plist);

    	$this->assign("menu",menu());
    	$this->assign('banner',banner());
        $this->display();
        
    }
}