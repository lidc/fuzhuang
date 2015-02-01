<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
use Think\Page;
use Think\Upload;
use Think\Image;
class BrandController extends Controller {
	
	public function index(){        
        $brand = M('brand');
        $where = 1;
        $brand_name = isset($_GET['brand_name']) ? in($_GET['brand_name']) : "";
        if(!empty($brand_name)){
            $where .= " AND brand_name like '%".$brand_name."%' ";
        }
 
        $select_hotoffers = isset($_GET['select_hotoffers']) ? $_GET['select_hotoffers'] : 'none'; 
        if($select_hotoffers!='none'){
        	$where .= " AND hotoffers=".$select_hotoffers." ";
        }
        
        $nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $numPerPage = 10;
        $count = $brand->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $brand->field('id,brand_name,small_img,add_time,hotOffers')->where($where)->order('add_time desc')->page($nowPage.','.$Page->listRows)->select();
        $cArr = array();
        
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$list);
        $this->assign("brand_name",$brand_name);
        $this->assign("hotoffers",$select_hotoffers);               
        $this->display();
    }
    
    public function add(){
        $brand = M('brand');
        if($_POST){            
            $brand_name = isset($_POST['brand_name']) ? in($_POST['brand_name']) : ""; 
            $brand_desc = isset($_POST['brand_desc']) ? in($_POST['brand_desc']) : "";
            $brand_url = isset($_POST['brand_url']) ? in($_POST['brand_url']) : "";
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;
            $hotOffers = isset($_POST['hotOffers']) ? intval($_POST['hotOffers']) : 0;
            $add_time = time();
            $brand_content = isset($_POST['brand_content']) ? in($_POST['brand_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";           
            
            $urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		$big_img_url = "";
    		$small_photo_url = "";
            if(isset($_FILES['big_img'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                if(!is_file($img_url.'brand_img')){
                    mkdir($img_url.'brand_img');
                }                
                $upload->savePath = 'brand_img/';
                $upload->rootPath = $img_url;
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();                    
                }else{
                    $big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
                    $image = new Image();    
                    if(!is_file($img_url.'brand_img/thumb_img')){
                        mkdir($img_url.'brand_img/thumb_img');
                        if(!is_file($img_url.'brand_img/thumb_img/'.$img_date)){
                            mkdir($img_url.'brand_img/thumb_img/'.$img_date);
                        }
                    }    
                    $thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'brand_img/thumb_img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    
                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    
                    $small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'brand_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
                }
            }

            $data = array(
                'brand_name'  	=>  $brand_name,
                'brand_desc'   	=>  $brand_desc,
            	'brand_url'		=>	$brand_url,
                'big_img'     	=>  $big_img_url ,
                'small_img'   	=>  $small_photo_url,
                'brand_content'	=>  $brand_content,
                'status'   		=>  $status,
                'hotOffers'     =>  $hotOffers,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );    
            $id = $brand->data($data)->add();
            if($id){
                echo "<script>alert('添加成功！');location.href='index';</script>";              
            }else{
                echo "<script>alert('添加失败！');location.href='add';</script>";
            }
        }        
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('brand_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }

    public function edit(){
        $brand = M('brand');
        if($_POST){        
        	$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        	if(!$id){
        		echo "无参数！";
        		exit();
        	}    
            $brand_name = isset($_POST['brand_name']) ? in($_POST['brand_name']) : ""; 
            $brand_desc = isset($_POST['brand_desc']) ? in($_POST['brand_desc']) : "";
            $brand_url = isset($_POST['brand_url']) ? in($_POST['brand_url']) : "";
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;
            $hotOffers = isset($_POST['hotOffers']) ? intval($_POST['hotOffers']) : 0;
            $add_time = time();
            $brand_content = isset($_POST['brand_content']) ? in($_POST['brand_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";  

           $data = array(
                'brand_name'  	=>  $brand_name,
                'brand_desc'   	=>  $brand_desc,
           		'brand_url'		=> 	$brand_url,
                'brand_content'	=>  $brand_content,
                'status'   		=>  $status,
                'hotOffers'     =>  $hotOffers,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            ); 
            
            $urlArr = C('TMPL_PARSE_STRING');
    		$img_url = $urlArr['__FILE__UPLOADS__'];                      //图片保存路径
    		$font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体
    		$big_img_url = "";
    		$small_photo_url = "";
            if(isset($_FILES['big_img'])){
                $img_date = date('Y-m-d');
                $upload = new Upload();
                $upload->maxSize = 3000000;     //文件大小限制
                $upload->mimes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');    // 设置附件上传类型
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 允许上传的文件后缀
                if(!is_file($img_url.'brand_img')){
                    mkdir($img_url.'brand_img');
                }                
                $upload->savePath = 'brand_img/';
                $upload->rootPath = $img_url;
                $info = $upload->upload();
                if(!$info){
                    echo $upload->getError();                    
                }else{
                    $big_img_url = $urlArr['__FILE_UPLOADS_URL__'].$info['big_img']['savepath'].$info['big_img']['savename'];
                    $image = new Image();    
                    if(!is_file($img_url.'brand_img/thumb_img')){
                        mkdir($img_url.'brand_img/thumb_img');
                        if(!is_file($img_url.'brand_img/thumb_img/'.$img_date)){
                            mkdir($img_url.'brand_img/thumb_img/'.$img_date);
                        }
                    }    
                    $thumb_save_file = $img_url.$info['big_img']['savepath'].$info['big_img']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'brand_img/thumb_img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['big_img']['savename'];                               //缩略图保存的路径
    
                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);
    
                    $small_photo_url = $urlArr['__FILE_UPLOADS_URL__'].'brand_img/thumb_img/'.$img_date.'/'.$info['big_img']['savename'];
                    $data['big_img'] = $big_img_url;
                    $data['small_img'] = $small_photo_url;
                }
            }

    
            $result = $brand->data($data)->where('id='.$id)->save();
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
        $dList = $brand->where('id='.$id)->find();
        $this->assign("dl",$dList);
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('brand_content',1000,380);
        $this->assign("editor",$editor_code);        
        $this->display();
    }
    
    public function delete(){
    	$brand = M('brand');
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    	if(!$id){
    		echo "无参数！";
    		exit();
    	}

    	$result = $brand->where('id='.$id)->delete();
    	if($result){
    		echo "<script>alert('删除成功！');location.href='index';</script>";
    	}else {
    		echo "<script>alert('删除失败！');location.href='index';</script>";
    	}
    }  
}