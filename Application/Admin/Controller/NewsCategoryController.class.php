<?php
namespace Admin\Controller;
use Think\Controller;
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
use Think\Image;

class NewsCategoryController extends Controller{
    public function index(){
        $news_category = M('news_category');
        $where = "pid=0";
        $c_title = isset($_GET['c_title']) ? in($_GET['c_title']) : "";
        if(!empty($c_title)){
            $where .= " AND nav_title like '%".$c_title."%' ";
        }
        $nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $numPerPage = 10;
        $count = $news_category->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $news_category->field('id,pid,c_title,small_img,myorder,status')->where($where)->order('myorder')->page($nowPage.','.$Page->listRows)->select();
        
        $cArr = array();
        foreach ($list as $key=>$value){
            if ($value['status']==0){
                $status = '无效';
            }else{
                $status = '有效';
            }
            $list[$key]['status'] = $status;
            $cl = $news_category->field('id,pid,c_title,small_img,myorder,status')->where("pid=".$value['id'])->order('myorder')->select();
            if($cl){
                $list[$key]['childY'] = $value['id'];
                $cArr[] = $list[$key];
                foreach ($cl as $k=>$v){
                    $cl[$k]['childY'] = $v['pid'];
                    if($v['status']==0){
                        $status = '无效';
                    }else{
                        $status = '有效';
                    }
                    $cl[$k]['status'] = $status;
                    $cArr[] = $cl[$k];
                }
            }else{
                $list[$key]['childY'] = "n";
                $cArr[]=$list[$key];
            }
        }
        
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$cArr);
        $this->assign("c_title",$c_title);
        $this->display();
    }
    
    public function add(){
        $news_category = M('news_category');
        if($_POST){
            $parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $c_title = isset($_POST['c_title']) ? in($_POST['c_title']) : "";
            $c_desc = isset($_POST['c_desc']) ? in($_POST['c_desc']) : "";
            $urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
            if(isset($_FILES['big_img'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                if(!is_file($img_url.'product_img')){
                    mkdir($img_url.'product_img');
                }                
                $upload->savePath = 'product_img/';
                $upload->rootPath = $img_url;
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();
                    $big_img_url = "";
                    $small_photo_url = "";
                }else{
                    $big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
                    $image = new Image();    
                    if(!is_file($img_url.'product_img/thumb_img')){
                        mkdir($img_url.'product_img/thumb_img');
                        if(!is_file($img_url.'product_img/thumb_img/'.$img_date)){
                            mkdir($img_url.'product_img/thumb_img/'.$img_date);
                        }
                    }   
    
                    $thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'product_img/thumb_img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    
                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    
                    $small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'product_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
                }
            }else{
                $big_img_url = "";
                $small_photo_url = "";
            }
            
            $myorder = isset($_POST['myorder']) ? intval($_POST['myorder']) : 0;
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;
            $add_time = time();            
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";
    
            $data = array(
                'pid'           =>  $parentid,
                'c_title'       =>  $c_title,
                'c_desc'        =>  $c_desc,
                'big_img'       =>  $big_img_url,
                'small_img'     =>  $small_photo_url,
                'myorder'       =>  $myorder,
                'status'        =>  $status,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );
            $result = $news_category->data($data)->add();
            if($result){
                echo "<script>alert('添加成功！');location.href='index';</script>";
            }else{
                echo "<script>alert('添加失败！');location.href='add';</script>";
            }    
        }
        $where = 'status=1 AND pid=0';
        $list = $news_category->field('id,c_title')->where($where)->order('myorder')->select();
        $this->assign("list",$list);
        $this->display();
    }
    
    public function edit(){
    	$news_category = M('news_category');
    	if($_POST){
    		$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    		if(!$id){
    			echo "无参数！";
    			exit();
    		}
    		$parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
    		$c_title = isset($_POST['c_title']) ? in($_POST['c_title']) : "";
    		$c_desc = isset($_POST['c_desc']) ? in($_POST['c_desc']) : "";
    		$myorder = isset($_POST['myorder']) ? intval($_POST['myorder']) : 0;
    		$status = isset($_POST['status']) ? intval($_POST['status']) : 1;
    		$add_time = time();
    		$meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
    		$meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
    		$meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";
    		 
    		$data = array(
    				'pid'           =>  $parentid,
    				'c_title'       =>  $c_title,
    				'c_desc'        =>  $c_desc,
    				'myorder'       =>  $myorder,
    				'status'        =>  $status,
    				'add_time'      =>  $add_time,
    				'meta_title'    =>  $meta_title,
    				'meta_keywords' =>  $meta_keywords,
    				'meta_description'  =>  $meta_description
    		);
    		
    		$urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		if(isset($_FILES['big_img'])){
    			$img_date = date('Y-m-d');
    			$upload = new Upload();
    			$upload->maxSize = 3000000;     //文件大小限制
    			$upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
    			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
    			if(!is_file($img_url.'product_img')){
    				mkdir($img_url.'product_img');
    			}
    			$upload->savePath = 'product_img/';
    			$upload->rootPath = $img_url;
    			$info = $upload->upload();
    			if(!$info){
    				echo $upload->getError();
    			}else{
    				$big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
    				$image = new Image();
    				if(!is_file($img_url.'product_img/thumb_img')){
    					mkdir($img_url.'product_img/thumb_img');
    					if(!is_file($img_url.'product_img/thumb_img/'.$img_date)){
    						mkdir($img_url.'product_img/thumb_img/'.$img_date);
    					}
    				}
    	
    				$thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
    				$thumb_url = $img_url.'product_img/thumb_img/'.$img_date;
    				$thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    	
    				$image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
    				$image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    	
    				$small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'product_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
    				$data['big_img'] = $big_img_url;
    				$data['small_img'] = $small_photo_url;
    			}
    		}    		
    		$result = $news_category->data($data)->where('id='.$id)->save();
    		if($result){
    			echo "<script>alert('修改成功！');location.href='index';</script>";
    		}else{
    			echo "<script>alert('修改失败！');location.href='edit';</script>";
    		}
    	}    
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    	if(!$id){
    		echo "<script>location.href='index';</script>";
    		exit;
    	}
    	$cList = $news_category->where('id='.$id)->find();
    	$this->assign("cl",$cList);
    	$where = 'status=1 AND pid=0';
    	$list = $news_category->field('id,c_title')->where($where)->order('myorder')->select();
    	$this->assign("list",$list);
    	$this->display();
    }
    
    public function delete(){
    	$news_category = M('news_category');
    	$news = M('news');
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    	if(!$id){
    		echo "无参数！";
    		exit();
    	}
    	$count = $news_category->where('pid='.$id)->count();
    	$where = "cid=".$id." or cpid=".$id."";
    	$count2 = $news->where($where)->count();
    	if($count>0 || $count2>0){
    		echo "<script>alert('删除失败！因子级关系或产品中有关联，请先删除关联关系！');location.href='index';</script>";
    		exit();
    	}else{    		
    		$result = $news_category->where('id='.$id)->delete();
    		if($result){
    			echo "<script>alert('删除成功！');location.href='index';</script>";
    		}else {
    			echo "<script>alert('删除失败！');location.href='index';</script>";
    		}
    	}   	
    }
}