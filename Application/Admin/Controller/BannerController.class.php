<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Think\Page;
class BannerController extends Controller {
    public function index(){
    	$banner = M('banner');
    	$where = 1;
    	$banner_title = isset($_GET['banner_title']) ? in($_GET['banner_title']) : "";
    	if(!empty($banner_title)){
    		$where .= " AND banner_title like '%".$banner_title."%' ";
    	}
    	$nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
    	$numPerPage = 10;
    	$count = $banner->where($where)->count();
    	$Page = new Page($count,$numPerPage);
    	$list = $banner->where($where)->order('myorder')->page($nowPage.','.$Page->listRows)->select();
    	$page_show = $Page->show();
    	$this->assign("page_show",$page_show);
    	$this->assign("list",$list);
    	$this->assign("banner_title",$banner_title);
        $this->display();
    }

    public function add(){
    	$banner = M('banner');
    	if($_POST){
    		$banner_title = isset($_POST['banner_title']) ? in($_POST['banner_title']) : "";
    		$website = isset($_POST['website']) ? in($_POST['website']) : "";
    		$myorder = isset($_POST['myorder']) ? in($_POST['myorder']) : "";
    		$banner_desc = isset($_POST['banner_desc']) ? in($_POST['banner_desc']) : "";
    		$urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		if(isset($_FILES['big_photo'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();                
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                $upload->savePath = 'Original_Img/';
                $upload->rootPath = $img_url;                
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();
                    $big_photo_url = "";
                    $small_photo_url = "";
                }else{
                    $big_photo_url = $urlArr['__UPLOAD_URL__'].$info['big_photo']['savepath'].$info['big_photo']['savename'];
                    $image = new Image();
                    
                    if(!is_file($img_url.'Thumb_Img/'.$img_date)){
                        mkdir($img_url.'Thumb_Img/'.$img_date);
                    }                    
                                        
                    $thumb_save_file = $img_url.$info['big_photo']['savepath'].$info['big_photo']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'Thumb_Img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_photo']['savename'];                               //缩略图保存的路径

                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);  

                    $small_photo_url = $urlArr['__UPLOAD_URL__'].'Thumb_Img/'.$img_date.'/'.$info['big_photo']['savename'];                
                }
            }else{
                $big_photo_url = "";
                $small_photo_url = "";
            }
            $add_time = time();
            
            $data = array(
            	'banner_title' => $banner_title,
            	'banner_desc' => $banner_desc,
            	'big_photo' => $big_photo_url,
            	'small_photo' => $small_photo_url,
            	'add_time' => $add_time,
            	'myorder' => $myorder,
            	'website' => $website,
            );
            $id = $banner->data($data)->add();
            if($id){
            	echo "<script>alert('添加成功！');</script>";            	
            }else{
            	echo "<script>alert('添加失败！');</script>";
            }            
    	}
    	$this->display();
    }
    
    public function edit(){
    	$banner = M('banner');    	
    	if($_POST){
    		$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    		if(!$id){
    			echo "无参数!";
    			exit;
    		}
    		$banner_title = isset($_POST['banner_title']) ? in($_POST['banner_title']) : "";
    		$website = isset($_POST['website']) ? in($_POST['website']) : "";
    		$myorder = isset($_POST['myorder']) ? in($_POST['myorder']) : "";
    		$banner_desc = isset($_POST['banner_desc']) ? in($_POST['banner_desc']) : "";    		
    		$add_time = time();    		 
    		$data = array(
    				'banner_title' => $banner_title,
    				'banner_desc' => $banner_desc,
    				'add_time' => $add_time,
    				'myorder' => $myorder,
    				'website' => $website,
    		);
    		
    		$urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		if(isset($_FILES['big_photo'])){
    			$img_date = date('Y-m-d');
    			$upload = new Upload();
    			$upload->maxSize = 3000000;     //文件大小限制
    			$upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
    			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
    			$upload->savePath = 'Original_Img/';
    			$upload->rootPath = $img_url;
    			$info = $upload->upload();
    			if(!$info){
    				echo $upload->getError();
    			}else{
    				$big_photo_url = $urlArr['__UPLOAD_URL__'].$info['big_photo']['savepath'].$info['big_photo']['savename'];
    				$image = new Image();
    	
    				if(!is_file($img_url.'Thumb_Img/'.$img_date)){
    					mkdir($img_url.'Thumb_Img/'.$img_date);
    				}
    	
    				$thumb_save_file = $img_url.$info['big_photo']['savepath'].$info['big_photo']['savename'];      //上传的图片路径
    				$thumb_url = $img_url.'Thumb_Img/'.$img_date;
    				$thumb_save_path = $thumb_url.'/'.$info['big_photo']['savename'];                               //缩略图保存的路径
    	
    				$image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
    				$image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    	
    				$small_photo_url = $urlArr['__UPLOAD_URL__'].'Thumb_Img/'.$img_date.'/'.$info['big_photo']['savename'];
    				
    				$data['big_photo'] = $big_photo_url;
    				$data['small_photo'] = $small_photo_url;
    			}
    		}
    		
    		$result = $banner->data($data)->where('id='.$id)->save();
    		if($result){
    			echo "<script>alert('修改成功！');location.href='index';</script>";
    		}else{
    			echo "<script>alert('修改失败！');location.href='edit';</script>";
    		}
    	}
    	
    	$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 0;
    	if(!$bid){
    		echo "无参数！"; 
    		exit;
    	}
    	$list = $banner->where('id='.$bid)->find();
    	$this->assign("ls",$list);    	
    	$this->display();
    }
}