<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller {
	
	public function nav(){
		$nav_page = M('nav_page');
		$product_category = M('product_category');
		$design_category = M('design_category');
		$news_category = M('news_category');
		$list = $nav_page->field('id,pid,nav_title')->where('pid=0')->select();
		$pArray = array();
		foreach ($list as $key=>$value){
			if($value['nav_title']=='产品展示'){
				$list[$key]['parent1'] = 'product';
				$pArray[] = $list[$key];
				$pl = $product_category->field('id,pid,c_title')->where('pid=0')->select();
				foreach ($pl as $kp=>$vp){
					$pcl = $product_category->field('id,pid,c_title')->where('pid='.$vp['id'])->select();
					if($pcl){
						$pl[$kp]['parent2'] = 'product';
						$pl[$kp]['child'] = 'p'.$vp['id'];
						$pArray[] = $pl[$kp];
						foreach ($pcl as $kpc=>$vpc){
							$pcl[$kpc]['child'] = 'p'.$vpc['pid'];
							$pcl[$kpc]['childY'] = 'y';
							$pArray[] = $pcl[$kpc];
						}
					}else{
						$pl[$kp]['parent2'] = 'product';
						$pl[$kp]['child'] = 'p'.$vp['id'];
						$pArray[] = $pl[$kp];
					}
				}
			}elseif($value['nav_title']=='创意设计'){
				$list[$key]['parent1'] = 'design';
				$pArray[] = $list[$key];
				$dl = $design_category->field('id,pid,c_title')->where('pid=0')->select();
				foreach ($dl as $kd=>$vd){
					$dcl = $design_category->field('id,pid,c_title')->where('pid='.$vd['id'])->select();
					if($dcl){
						$dl[$kd]['parent2'] = 'design';
						$dl[$kd]['child'] = 'd'.$vd['id'];
						$pArray[] = $dl[$kd];
						foreach ($dcl as $kdc=>$vdc){
							$dcl[$kdc]['child'] = 'd'.$vdc['pid'];
							$dcl[$kdc]['childY'] = 'y';
							$pArray[] = $dcl[$kdc];
						}
					}else{
						$dl[$kd]['parent2'] = 'design';
						$dl[$kd]['child'] = 'd'.$vd['id'];
						$pArray[] = $dl[$kd];
					}
				}
			}elseif($value['nav_title']=='新闻资讯'){
				$list[$key]['parent1'] = 'news';
				$pArray[] = $list[$key];
				$nl = $news_category->field('id,pid,c_title')->where('pid=0')->select();
				foreach ($nl as $kn=>$vn){
					$ncl = $news_category->field('id,pid,c_title')->where('pid='.$vn['id'])->select();
					if($ncl){
						$nl[$kn]['parent2'] = 'news';
						$nl[$kn]['child'] = 'n'.$vn['id'];
						$pArray[] = $nl[$kn];
						foreach ($ncl as $knc=>$vnc){
							$ncl[$knc]['child'] = 'n'.$vnc['pid'];
							$ncl[$knc]['childY'] = 'y';
							$pArray[] = $pcl[$knc];
						}
					}else{
						$nl[$kn]['parent2'] = 'news';
						$nl[$kn]['child'] = 'n'.$vn['id'];
						$pArray[] = $nl[$kn];
					}
				}
			}else {
				$ncl = $nav_page->field('id,pid,nav_title')->where('pid='.$value['id'])->select();
				if($ncl){
					$list[$key]['parent1'] = $value['id'];
					$list[$key]['child'] = '';
					$pArray[] = $list[$key];
					foreach ($ncl as $knc=>$vnc){
						$ncl[$knc]['parent2'] = $vnc['pid'];
						$pArray[] = $ncl[$knc];
					}
				}else{
					$list[$key]['parent1'] = $value['id'];
					$pArray[] = $list[$key];
				}
			}
		}
		// 		print_r($pArray);
		$this->assign("list",$pArray);		 
	}
	
	public function bottom(){
		echo "打开看看";
		 
	}
}