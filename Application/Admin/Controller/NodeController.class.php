<?php
namespace Admin\Controller;
use Think\Controller;
use Think\KindEditor;
use Think\Page;
use Think\Upload;
use Think\Image;
class NodeController extends Controller {
    
    public function index(){        
        $nav_page = M('nav_page');
        $where = "pid=0";
        $nav_title = isset($_GET['nav_title']) ? in($_GET['nav_title']) : "";
        if(!empty($nav_title)){
            $where .= " AND nav_title like '%".$nav_title."%' ";
        }
        $nowPage = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $numPerPage = 10;
        $count = $nav_page->where($where)->count();
        $Page = new Page($count,$numPerPage);
        $list = $nav_page->field('id,pid,nav_title,nav_photo,thumb_photo,nav_order,nav_status')->where($where)->order('nav_order')->page($nowPage.','.$Page->listRows)->select();
        
        $nArr = array();
        foreach ($list as $key=>$value){
            if ($value['nav_status']==0){
                $status = '无效';
            }else{
                $status = '有效';
            }
            $list[$key]['status'] = $status;
            $cl = $nav_page->field('id,pid,nav_title,nav_photo,thumb_photo,nav_order,nav_status')->where("pid=".$value['id'])->order('nav_order')->select();
            if($cl){
                $list[$key]['childY'] = $value['id'];
                $nArr[] = $list[$key];
                foreach ($cl as $k=>$v){
                    $cl[$k]['childY'] = $v['pid'];
                    if($v['nav_status']==0){
                        $status = '无效';
                    }else{
                        $status = '有效';
                    }
                    $cl[$k]['status'] = $status;
                    $nArr[] = $cl[$k];
                }
            }else{
                $list[$key]['childY'] = "n";
                $nArr[]=$list[$key];                
            }
        }    
        
        $page_show = $Page->show();
        $this->assign("page_show",$page_show);
        $this->assign("list",$nArr);
        $this->assign("nav_title",$nav_title);
        $this->display();
    }
    
    public function add(){
        $nav_page = M('nav_page');
        if($_POST){            
            $parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $nav_title = isset($_POST['nav_title']) ? in($_POST['nav_title']) : ""; 
            $page_url = isset($_POST['page_url']) ? in($_POST['page_url']) : "";
            $nav_desc = isset($_POST['nav_desc']) ? in($_POST['nav_desc']) : "";
            $urlArr = C('TMPL_PARSE_STRING');            
            $img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
            $font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体 
            if(isset($_FILES['nav_photo'])){
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
                    $nav_photo_url = "";
                    $thumb_photo_url = "";
                }else{
                    $nav_photo_url = $urlArr['__UPLOAD_URL__'].$info['nav_photo']['savepath'].$info['nav_photo']['savename'];
                    $image = new  Image();
                    
                    if(!is_file($img_url.'Thumb_Img/'.$img_date)){
                        mkdir($img_url.'Thumb_Img/'.$img_date);
                    }
                    
                                        
                    $thumb_save_file = $img_url.$info['nav_photo']['savepath'].$info['nav_photo']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'Thumb_Img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['nav_photo']['savename'];                               //缩略图保存的路径

                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);  

                    $thumb_photo_url = $urlArr['__UPLOAD_URL__'].'Thumb_Img/'.$img_date.'/'.$info['nav_photo']['savename'];                
                }
            }else{
                $nav_photo_url = "";
                $thumb_photo_url = "";
            }
            $nav_order = isset($_POST['nav_order']) ? intval($_POST['nav_order']) : 0;
            $nav_status = isset($_POST['nav_status']) ? intval($_POST['nav_status']) : 1;
            $add_time = time();
            $page_content = isset($_POST['page_content']) ? in($_POST['page_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";

            $data = array(
                'pid'           =>  $parentid,
                'nav_title'     =>  $nav_title,
            	'page_url'		=>	$page_url,
                'nav_desc'      =>  $nav_desc,
                'nav_photo'     =>  $nav_photo_url,
                'thumb_photo'   =>  $thumb_photo_url,
                'nav_order'     =>  $nav_order,
                'nav_status'    =>  $nav_status,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );    
            $id = $nav_page->data($data)->add();
            if($id){
                $data_c = array(
                    'nav_id'    =>  $id,
                    'content'   =>  $page_content
                );
                $nav_content = M('page_content');
                $result = $nav_content->data($data_c)->add();
                if($result){
                    echo "<script>alert('添加成功！');location.href='index';</script>";
                }else{
                    echo "<script>alert('添加失败！');location.href='add';</script>";
                }
            }else{
                echo "<script>alert('添加失败！');location.href='add';</script>";
            }

        }
        $where = 'nav_status=1 AND pid=0';
        $list = $nav_page->field('id,nav_title')->where($where)->order('nav_order')->select();
        $this->assign("list",$list);
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('page_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }

    public function edit(){
        $nav_page = M('nav_page');
        $nav_content = M('page_content');
        if($_POST){           
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            if(!$id){
                echo "无参数";
                exit;
            }
            $parentid = isset($_POST['parentid']) ? intval($_POST['parentid']) : 0;
            $nav_title = isset($_POST['nav_title']) ? in($_POST['nav_title']) : ""; 
            $page_url = isset($_POST['page_url']) ? in($_POST['page_url']) : "";
            $nav_desc = isset($_POST['nav_desc']) ? in($_POST['nav_desc']) : "";            
            $nav_order = isset($_POST['nav_order']) ? intval($_POST['nav_order']) : 0;
            $nav_status = isset($_POST['nav_status']) ? intval($_POST['nav_status']) : 1;
            $add_time = time();
            $page_content = isset($_POST['page_content']) ? in($_POST['page_content']) : "";
            $meta_title = isset($_POST['meta_title']) ? in($_POST['meta_title']) : "";
            $meta_keywords = isset($_POST['meta_keywords']) ? in($_POST['meta_keywords']) : "";
            $meta_description = isset($_POST['meta_description']) ? in($_POST['meta_description']) : "";

            $data = array(
                'pid'           =>  $parentid,
                'nav_title'     =>  $nav_title,
            	'page_url'		=>	$page_url,
                'nav_desc'      =>  $nav_desc,
                'nav_order'     =>  $nav_order,
                'nav_status'    =>  $nav_status,
                'add_time'      =>  $add_time,
                'meta_title'    =>  $meta_title,
                'meta_keywords' =>  $meta_keywords,
                'meta_description'  =>  $meta_description
            );

            //图片上传
            $urlArr = C('TMPL_PARSE_STRING');            
            $img_url = $urlArr['__UPLOAD_PATH__'];                      //图片保存路径
            $font_url = $urlArr['__PUBLIC_FONT__'].'FZSTK.TTF';         //字体 
            if(isset($_FILES['nav_photo'])){
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
                    $nav_photo_url = $urlArr['__UPLOAD_URL__'].$info['nav_photo']['savepath'].$info['nav_photo']['savename'];
                    $image = new  Image();
                    
                    if(!is_file($img_url.'Thumb_Img/'.$img_date)){
                        mkdir($img_url.'Thumb_Img/'.$img_date);
                    }
                    
                                        
                    $thumb_save_file = $img_url.$info['nav_photo']['savepath'].$info['nav_photo']['savename'];      //上传的图片路径
                    $thumb_url = $img_url.'Thumb_Img/'.$img_date;
                    $thumb_save_path = $thumb_url.'/'.$info['nav_photo']['savename'];                               //缩略图保存的路径

                    $image->open($thumb_save_file)->text('简朵', $font_url, 36,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->thumb(100, 100)->save($thumb_save_path);
                    $image->open($thumb_save_file)->text('简朵', $font_url, 32,'#A7AAA4',$image::IMAGE_WATER_SOUTHEAST)->save($thumb_save_file);  

                    $thumb_photo_url = $urlArr['__UPLOAD_URL__'].'Thumb_Img/'.$img_date.'/'.$info['nav_photo']['savename'];  

                    $data['nav_photo'] = $nav_photo_url;
                    $data['thumb_photo'] = $thumb_photo_url;
                }
            }
            $data_c = array(
                'content'   =>  $page_content
            );
            $result1 = $nav_content->data($data_c)->where('nav_id='.$id)->save();
            
            $result = $nav_page->data($data)->where('id='.$id)->save();
            if($result || $result1){                                
                echo "<script>alert('修改成功！');location.href='index';</script>";      
                exit;         
            }else{
                echo "<script>alert('修改失败！');location.href='index';</script>";
                exit;
            }
        }
        
        $nav_id = isset($_GET['nav_id']) ? intval($_GET['nav_id']) : 0;
        if(!$nav_id){
            echo "<script>location.href='index';</script>";
            exit;
        }        
        $navList = $nav_page->where('id='.$nav_id)->find();
        $navCList = $nav_content->where('nav_id='.$nav_id)->find();
        $this->assign("nl",$navList);
        $this->assign("ncl",$navCList);
        $where = 'nav_status=1 AND pid=0';
        $list = $nav_page->field('id,nav_title,pid')->where($where)->order('nav_order')->select();
        $this->assign("list",$list);
        $KindEditor_obj = new KindEditor();
        $editor_code = $KindEditor_obj->create_editor('page_content',1000,380);
        $this->assign("editor",$editor_code);
        $this->display();
    }
    
    public function delete(){
    	$nav_page = M('nav_page');
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    	if(!$id){
    		echo "无参数！";
    		exit();
    	}
    	$count = $nav_page->where('pid='.$id)->count();
    	if($count>0){
    		echo "<script>alert('删除失败,有子级关联关系，请先删除子级！');location.href='index';</script>";
    		exit();
    	}else{
    		$result = $nav_page->where('id='.$id)->delete();
    		if($result){
    			echo "<script>alert('删除成功！');location.href='index';</script>";
    		}else {
    			echo "<script>alert('删除失败！');location.href='index';</script>";
    		}
    	}
    }
}